<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        return view('admin/index');
    }

    function category(){
        return view('admin/category');
    }

    function product(){
        return view('admin/product');
    }

    function user(){
        return view('admin/user');
    }

    function voucher(){
        return view('admin/voucher');
    }

    function order(){
        return view('admin/order');
    }
}
