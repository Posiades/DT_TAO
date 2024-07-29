<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\orders;


class clientController extends Controller
{
    function info(){
        $user = Session::get('user');
        return view('client.index', compact('user'));
    }

    function edit_info(){
        $user = Session::get('user');
        return view('client.edit_info', compact('user'));
    }

    function post_edit_info(Request $req, $id){
        $name = $req -> name;
        $email = $req -> email;
        $address = $req -> address;
        $phone = $req -> phone;

        DB::table('users')
        ->where('user_id', $id)
        ->update([
            'full_name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone
        ]);
        Session::flash('update_info', "Đã thay đổi thông tin tài khoản $name thành công");
        $user = user::where('user_id',$id)->first();
        Session::put('user', $user);
        return redirect()->route('client.index');
    }

    function order(){
        $id_user = Session::get('user')->user_id;

        $order = DB::table('orders')
            ->join('order_detail', 'orders.order_id', '=', 'order_detail.order_id')
            // Kết nối với bảng product
            ->join('product', 'order_detail.product_id', '=', 'product.product_id')
            // Kết nối với bảng option
            ->join('option', 'order_detail.option_id', '=', 'option.option_id')
            ->select(
                'orders.*',
                'order_detail.order_detail_id',
                'order_detail.order_id',
                'order_detail.product_id',
                'order_detail.option_id',
                'order_detail.quantity',
                'order_detail.price',
                'product.product_name', // Giả sử bạn muốn lấy cột product_name từ bảng product
                'option.option_name'   // Giả sử bạn muốn lấy cột option_name từ bảng option
            )
            ->where('orders.user_id', $id_user)
            ->get();

            dd($order->product_name);
        
        return view('client.order', compact('order'));
    }
    


}
