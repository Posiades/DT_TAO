<?php

namespace App\Http\Controllers;
use App\Models\orders;
use App\Models\orderdetail;
use App\Models\voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\checkout;
use App\Models\product;

class VnpayController extends Controller
{
    public function vnpayPayment(Request $request)
    {   
        $total = 0;
        if ($request->has('total_voucher') && !empty($request->total_voucher)) {
            $total = $request->total_voucher;
        } else {
            foreach (session('cart') as $details) {
                $total += $details['price'] * $details['quantity'];
            }
        }

        $order = new orders();
        $order->order_code = Str::random(8);
        $order->user_id = Session::get('user')->user_id;
        $order->total_price = $total;
        $order->status = 'Chưa Thanh Toán';
        $order->save();

        $cart = session()->get('cart');

        foreach($cart as $details) {
            $order_detail = new orderdetail();
            $order_detail->order_id = $order->order_id;
            $order_detail->product_id = $details['product_id'];
            $order_detail->quantity = $details['quantity'];
            $order_detail->price = $total;
            $order_detail->save();
        }

        if ($request->has('code_voucher')) {
            $voucher = voucher::where('code', $request->code_voucher)->first();
            
            if ($voucher) {
                $quantity_update = $voucher->quantity - 1;
                DB::table('voucher')
                    ->where('code', $voucher->code)
                    ->update(['quantity' => $quantity_update]);
            }
        }
        
        foreach ($cart as $details) {
            $product_id = $details['product_id'];
            $quantity_purchased = $details['quantity'];
        
            $product = product::find($product_id);
        
            if ($product) {
                $product->quantity = $product->quantity - $quantity_purchased;
                $product->save();
            }
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = url("vnpay-return");
        $vnp_TmnCode = "0ABOP2OM";
        $vnp_HashSecret = "WTNZURI6MSR7FZA3CQY5GYDJXY9E3YEB";
        
        $vnp_TxnRef = $order->order_code;
        $vnp_OrderInfo = "Thanh toán hóa đơn";
        $vnp_OrderType = "DT Tao";
        $vnp_Amount = $total * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = "WTNZURI6MSR7FZA3CQY5GYDJXY9E3YEB";
        $inputData = array();
        $returnData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnpTranId = $inputData['vnp_TransactionNo'];
        $vnp_BankCode = $inputData['vnp_BankCode'];
        $vnp_Amount = $inputData['vnp_Amount'] / 100;
        $order_code = $inputData['vnp_TxnRef'];

        try {
            if ($secureHash == $vnp_SecureHash) {
                $order = orders::where('order_code', $order_code)->first();
                
                if ($order != NULL) {
                    if($order->total_price == $vnp_Amount)
                    {
                        if ($order->status == 'Chưa Thanh Toán') {
                            if ($inputData['vnp_ResponseCode'] == '00' && $inputData['vnp_TransactionStatus'] == '00') {
                                $Status = 'Đã Thanh Toán';
                            } else {
                                $Status = 'Chưa Thanh Toán';
                            }
                            
                            $order->status = $Status;
                            $order->vnp_transaction_id = $vnpTranId;
                            $order->save();

                            $userEmail = $order->user->email;
                            $this->sendCheckoutEmail($userEmail);
                            session()->forget('cart');

                            if ($Status == 'Đã Thanh Toán') {
                                return redirect()->route('index')->with('success', 'Thanh toán thành công!');
                            } else {
                                return redirect()->route('index')->with('error', 'Thanh toán thất bại!');
                            }
                        } else {
                            return redirect()->route('index')->with('info', 'Đơn hàng đã được xác nhận trước đó.');
                        }
                    }
                    else {
                        return redirect()->route('index')->with('error', 'Số tiền không hợp lệ.');
                    }
                } else {
                    return redirect()->route('index')->with('error', 'Không tìm thấy đơn hàng.');
                }
            } else {
                return redirect()->route('index')->with('error', 'Chữ ký không hợp lệ.');
            }
        } catch (Exception $e) {
            return redirect()->route('index')->with('error', 'Đã xảy ra lỗi không xác định.');
        }
    }

    protected function sendCheckoutEmail($email){
        $cart = session()->get('cart');
        $total = 0;
        foreach (session('cart') as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        if ($email) {
            Mail::to($email)->send(new checkout($cart, $total));
        }
    }
}