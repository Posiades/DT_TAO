<?php

namespace App\Http\Controllers;
use App\Models\orders;
use App\Models\orderdetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VnpayController extends Controller
{
    public function vnpayPayment(Request $request)
    {   
        $total = 0;
        foreach (session('cart') as $details) {
            $total += $details['price'] * $details['quantity'];
        }

    $order = new orders();
    $order->order_code = Str::random(8);
    $order->user_id =Session::get('user')->user_id;
    $order->total_price=$total;
    
    $order ->save();
    


    $cart = session()->get('cart');

    foreach($cart as $details) {
        $order_detail = new orderdetail();
        $order_detail->order_id = $order->order_id;
        $order_detail->product_id = $details['product_id'];
        
        $order_detail->quantity=$details['product_id'];;
        $order_detail->price = $details['price'];

        $order_detail->save();
    }
    

    $data=$request->all();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl =  url("vnpay-return");
    $vnp_TmnCode = "0ABOP2OM";//Mã website tại VNPAY 
    $vnp_HashSecret = "WTNZURI6MSR7FZA3CQY5GYDJXY9E3YEB"; //Chuỗi bí mật
    
    //$vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_TxnRef = $order->order_code;
    // $vnp_OrderInfo = $_POST['order_desc'];
    $vnp_OrderInfo = "Thanh toán hóa đơn";
    // $vnp_OrderType = $_POST['order_type'];
    $vnp_OrderType = "DT Tao";
    // $vnp_Amount = $_POST['amount'] * 100;
    $vnp_Amount = $order->total_price *100;
    $vnp_Locale = "VN";
    // $vnp_BankCode = $_POST['bank_code'];
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
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
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
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
    // public function vnpayReturn(Request $request)
    // {
    //     $vnp_HashSecret = "WTNZURI6MSR7FZA3CQY5GYDJXY9E3YEB"; // Chuỗi bí mật
    //     $vnp_TmnCode = "0ABOP2OM"; // Mã website tại VNPAY

    //     $vnp_SecureHash = $request->input('vnp_SecureHash');

    //     $vnp_ResponseCode = $request->input('vnp_ResponseCode');
    //     $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã đơn hàng
    //     $vnp_Amount = $request->input('vnp_Amount'); // Số tiền

    //     // Tạo chuỗi hash từ dữ liệu nhận được
    //     $vnp_Data = [];
    //     foreach ($request->all() as $key => $value) {
    //         if ($key != 'vnp_SecureHash') {
    //             $vnp_Data[$key] = $value;
    //         }
    //     }
    //     ksort($vnp_Data);
    //     $hashData = urldecode(http_build_query($vnp_Data));
    //     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    //     // Kiểm tra hash
    //     // $order= orders::where ("order_code")
    //     if ($vnp_SecureHash == $secureHash) {

    //         if ($vnp_ResponseCode == '00') {
    //             // Lấy thông tin giỏ hàng từ session
    //             $cart = session('cart');
    //             if (!$cart) {
    //                 return redirect('/')->with('error', 'Giỏ hàng trống!');
    //             }

    //             // Bắt đầu giao dịch database
    //             DB::beginTransaction();

    //             try {
    //                 // Lưu đơn hàng vào cơ sở dữ liệu
    //                 $order = new Order();
    //                 $order->order_id = $vnp_TxnRef;
    //                 $order->amount = $vnp_Amount / 100; // Chuyển đổi từ tiền xu về tiền thực
    //                 $order->status = 'completed';
    //                 $order->save();

    //                 // Lưu chi tiết đơn hàng vào cơ sở dữ liệu
    //                 foreach ($cart as $item) {
    //                     OrderDetail::create([
    //                         'order_id' => $order->id,
    //                         'product_id' => $item['id'],
    //                         'quantity' => $item['quantity'],
    //                         'price' => $item['price'],
    //                     ]);
    //                 }

    //                 // Xóa giỏ hàng sau khi lưu đơn hàng thành công
    //                 session()->forget('cart');

    //                 DB::commit();
    //                 return redirect('/thanh-toan-thanh-cong')->with('success', 'Thanh toán thành công!');
    //             } catch (\Exception $e) {
    //                 DB::rollBack();
    //                 return redirect('/thanh-toan-that-bai')->with('error', 'Có lỗi xảy ra khi lưu đơn hàng!');
    //             }
    //         } else {
    //             return redirect('/thanh-toan-that-bai')->with('error', 'Thanh toán thất bại!');
    //         }
    //     } else {
    //         return redirect('/thanh-toan-that-bai')->with('error', 'Chữ ký không hợp lệ!');
    //     }
    // }

    public function vnpayReturn()
    {
         /* Payment Notify
         * IPN URL: Ghi nhận kết quả thanh toán từ VNPAY
         * Các bước thực hiện:
         * Kiểm tra checksum
         * Tìm giao dịch trong database
         * Kiểm tra số tiền giữa hai hệ thống
         * Kiểm tra tình trạng của giao dịch trước khi cập nhật
         * Cập nhật kết quả vào Database
         * Trả kết quả ghi nhận lại cho VNPAY
         */
        $vnp_HashSecret = "WTNZURI6MSR7FZA3CQY5GYDJXY9E3YEB";
        $inputData = array();
        $returnData = array();
        foreach ($_GET as $key => $value) {
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
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $vnp_Amount = $inputData['vnp_Amount'] / 100; // Số tiền thanh toán VNPAY phản hồi

        $Status = 0; // Là trạng thái thanh toán của giao dịch chưa có IPN lưu tại hệ thống của merchant chiều khởi tạo URL thanh toán.
        $order_code = $inputData['vnp_TxnRef'];

        try {
            //Check order_code
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);

                $order = orders::where('order_code', $order_code)->first();
                
                if ($order != NULL) {
                    if($order->total_price == $vnp_Amount) //Kiểm tra số tiền thanh toán của giao dịch: giả sử số tiền kiểm tra là đúng. //$order["Amount"] == $vnp_Amount
                    {
                        
                        if ($order->status !== NULL && $order->status == 'Chưa Thanh Toán') {
                            if ($inputData['vnp_ResponseCode'] == '00' && $inputData['vnp_TransactionStatus'] == '00') {
                                $Status = 'Đã Thanh Toán'; // Trạng thái thanh toán thành công

                            } else {
                                $Status = 'Chưa Thanh Toán'; // Trạng thái thanh toán thất bại / lỗi
                            }
                            //Cài đặt Code cập nhật kết quả thanh toán, tình trạng đơn hàng vào DB
                            $order->status = $Status;
                            $order->vnp_transaction_id = $vnpTranId;
                            
                            $order->save();
                            //Trả kết quả về cho VNPAY: Website/APP TMĐT ghi nhận yêu cầu thành công
                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                            return redirect('/')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
                        } else {
                            $returnData['RspCode'] = '02';
                            $returnData['Message'] = 'Order already confirmed';
                        }
                    }
                    else {
                        $returnData['RspCode'] = '04';
                        $returnData['Message'] = 'invalid amount';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid signature';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
        //Trả lại VNPAY theo định dạng JSON
       return json_encode($returnData);
    }
}
