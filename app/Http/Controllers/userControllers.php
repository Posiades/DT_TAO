<?php

namespace App\Http\Controllers;

use App\Mail\fogotPassWord;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class userControllers extends Controller
{
    function register(Request $req){
        
        $email = $req -> email;
        $full_name = $req -> fullname;
        $address = $req -> address;
        $phone = $req -> phone;  
        $pass = $req -> pass;
        $re_pass = $req -> re_pass;
        if($pass === $re_pass){
            $pass_Final = Hash::make($pass);
            user::create([
                'email' => $email,
                'password' => $pass_Final,
                'full_name' => $full_name,
                'address' => $address,
                'phone' => $phone
            ]);
        }
        Session::flash('success', 'Đăng Ký Tài Khoản Thành Công.');
        return view('user/login');
    }

    function login(Request $req){
        if(Auth::attempt($req->only('email', 'password'))){
            if (Auth::user()->role === 1) {
                return view('admin/index');
            } else {
                return redirect()->route('index');
            }
        }else {
            Session::flash('login_fail', 'Sai tên email hoặc mật khẩu');
            return view('user/login');
        }
    }

    function confirm(Request $req){
        $token = openssl_random_pseudo_bytes(32);
        $token = hash('sha256', $token);
        $email = $req -> email;
        $user = user::where('email', $email)->get();    
        foreach($user as $user_email){
            $user_email_ = $user_email -> email;
            if($user_email_ == $email){
                session()->put($email, $token, 60*5);
                Session::flash('change_pass', "Đã Gửi Thư Xác Nhận Thay Đổi Mật Khẩu Đến $email Thành Công");
                Mail::to($email)->send(new fogotPassWord($email, $token));
                return view('user/forgotpass');
            }else{
                Session::flash('email_null', 'Email của bạn không tồn tại trên hệ thống');
                return view('user/forgotpass');
            }
        }
    }

    function reset_pass($email, $token){
        $token_mail = session()->get($email);
        if($token = $token_mail){
            return view('user/reset_pass', compact('email'));
        }else{
            Session::flash('token_wrong', 'Mã Token Xác Thực Token Không Chính Xác');
            return view('user/forgotpass');
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }


}