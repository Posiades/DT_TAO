<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use App\Models\User;
use App\Models\voucher;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function index(){
        return view('admin/index');
    }

    function category(){
        $categories = categories::all();
        return view('admin/category', compact('categories'));
    }

    function product(){
        $product = DB::table('product')
        ->join('categories', 'product.category_id', '=', 'categories.category_id')
        ->select('product.*', 'categories.name as category_name')
        ->get();
        return view('admin/product', compact('product'));
    }

    function user(){
        $user = user::all();
        return view('admin/user', compact('user'));
    }

    function voucher(){
        $voucher = voucher::all();
        return view('admin/voucher', compact('voucher'));
    }

    function order(){
        return view('admin/order');
    }

    function add_product(){
        return view('admin/add_product');   
    }
}
