<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use App\Models\User;
use App\Models\voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    function post_add_product(Request $req){
        $type_sp = $req -> option;
        $name = $req -> name;
        $slug = str_replace(' ', '-', $name);
        $price = $req -> price;
        $mota = $req -> mota;
        $img = $req -> image_url;
        if ($req->hasFile('image_url')) {
            $image = $req->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('new_file_img'), $imageName);
            $img = '/new_file_img/' . $imageName;
        } else {
            $img = '/default_image.jpg'; // Ảnh mặc định nếu không có ảnh được upload
        }
        $quantity = $req -> quantity;

        $product = new product;
        $product -> category_id = $type_sp;
        $product -> name = $name;
        $product -> description = $mota;
        $product -> image_url = $img;
        $product -> price_difference = $price;
        $product -> slug = $slug;
        $product -> quantity = $quantity;
        $product->save();

        Session::flash('add_product', "Thêm sản phẩm $name thành công");
        return redirect()->route('add_product');   
    }

    function edit_product($id){
        $product = product::findOrFail($id);
        return view('admin/edit_product', compact('product'));
    }

    function post_edit_product(Request $req){
            
    }
}
