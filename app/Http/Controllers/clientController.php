<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\conTract;

use App\Models\orders;
use App\Models\orderdetail;


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
        $birth = $req ->birth;
        $sex = $req -> sex;
        $avatar = $req -> avatar;

        if($avatar != null){
            DB::table('users')
            ->where('user_id', $id)
            ->update([
                'avatar' => end_code_form_imageBase64($req->avatar),
                'full_name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'sex' => $sex,
                'birth' => $birth
        ]);
        }else{
            DB::table('users')
            ->where('user_id', $id)
            ->update([
                'full_name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'sex' => $sex,
                'birth' => $birth
            ]);
        }
        
        Session::flash('update_info', "Đã thay đổi thông tin tài khoản $name thành công");
        $user = user::where('user_id',$id)->first();
        Session::put('user', $user);
        return redirect()->route('client.index');
    }

    function order(){
        $user_id = Session::get('user')->user_id;
        $order = DB::table('orders')
            ->where('orders.user_id', $user_id) 
            ->join('order_detail', 'orders.order_id', '=', 'order_detail.order_id')
            ->join('product', 'order_detail.product_id', '=', 'product.product_id')
            ->join('users', 'orders.user_id', '=', 'users.user_id')
            ->select([
                'orders.*',
                'order_detail.product_id',
                'order_detail.price',
                'users.full_name',
                'users.phone',
                'users.address',
                'product.name',
                'product.color',
                'product.storage'
            ])
            ->paginate(10);

        return view('client.order', compact('order'));
    }
    
    function contract(){
        $user = Session::get('user');
        return view('client.contract', compact('user'));
    }

    function post_contract(Request $req){
        $auth_mail = "thachnguyenngoc2504@gmail.com";
        $email = $req -> email;
        $name = $req -> name;
        $phone = $req -> phone;
        $title = $req -> title;
        $content = $req -> content;
        Mail::to($auth_mail)->send(new conTract($email, $name, $phone, $title, $content));

        Session::flash('thanks', "Cảm ơn bạn đã đặt câu hỏi cho chúng tôi");
        return redirect()->back();
    }

}
