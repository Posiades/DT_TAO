<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class homeControllers extends Controller
{
    function index(){
        $product_iphone = product::where('category_id', 1)->limit(4)->get();
        $product_watch = product::where('category_id', 4)->limit(4)->get();
        return view('user/index', compact('product_iphone', 'product_watch'));
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

    function shop($type){
        $product_iphone = product::where('category_id', 1)->get();
        $product_mac = product::where('category_id', 2)->get();
        $product_ipad = product::where('category_id', 3)->get();
        $product_watch = product::where('category_id', 4)->get();
        $product_airpod = product::where('category_id', 5)->get();
        $product = null;
        if($type == "iphone"){
            $product = $product_iphone;
            return view('user/shop', compact('product'));
        }else if($type == "mac"){
            $product = $product_mac;
            return view('user/shop', compact('product'));
        }else if ($type == "ipad"){
            $product = $product_ipad;
            return view('user/shop', compact('product'));
        }else if ($type == "watch"){
            $product = $product_watch;
            return view('use/shop', compact('product'));
        }else if($type == "airpod"){
            $product = $product_airpod;
            return view('user/shop', compact('product'));
        }
        else{
            echo "<h1> 404 NOT FOUND </h1>";
        }
                
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

    function detail($slug){
        $product = product::where('slug', $slug)->get();
        return view('user/detail', compact('product'));
    }

    function cart(){
        return view('user/cart');
    }

    function checkout(){
        return view('user/checkout');
    }
}
