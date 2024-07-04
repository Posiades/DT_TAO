<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeControllers extends Controller
{
    function index(){
        return view('user/index');
    }

    function about(){
        return view('user/about');
    }

    function contract(){
        return view('user/contract');
    }

    function blog(){
        return view('user/blog');
    }

    function shop(){
        return view('user/shop');
    }

    function search(){
        return view('user/search');
    }

    function login(){
        return view('user/login');
    }

    function register(){
        return view('user/register');
    }

    
    // function có thông số chuyền vào 
    
    function single_post(){
        return view('user/single_post');
    }

    function detail(){
        return view('user/detail');
    }

    function cart(){
        return view('user/cart');
    }

    function checkout(){
        return view('user/checkout');
    }
}
