<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        Session::flash('success', 'Đã lưu thành công.');
        return view('user/login');
    }

    function login(Request $req){
        if(Auth::attempt($req->only('email', 'password'))){
            if (Auth::user()->role == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('index');
            }
        }else {
            Session::flash('login_fail', 'Sai tên email hoặc mật khẩu');
            return redirect()->back();
        }
    }


}
