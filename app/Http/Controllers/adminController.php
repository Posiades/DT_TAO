<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use App\Models\User;
use App\Models\voucher;
use Database\Seeders\product_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $img = '/default_image.jpg'; 
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
        return redirect()->route('product');   
    }

    function edit_product($id){
        $product = product::findOrFail($id);
        return view('admin/edit_product', compact('product'));
    }


    function post_edit_product(Request $req){
        $id = $req -> id;
        $type = $req -> type;
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
            $img = '/default_image.jpg'; 
        }
        $quantity = $req -> quantity;
        DB::table('product')
        ->where('product_id', $id)
        ->update([
            'category_id' => $type,
            'name' => $name,
            'description' => $mota,
            'image_url' => $img,
            'price_difference' => $price,
            'slug' => $slug,
            'quantity' => $quantity
        ]);

        Session::flash('edit_sp', "Đã thêm thành công sản phẩm $name thành công");
        return redirect()->route('product');
    }

    function del_confirm($id, $type){
        $result = null;
        if($type == "product"){
            $result = product::findOrFail($id);
            $type = "product";
            return view('admin.del_confirm', compact('result', 'type'));
        }else{
            $result = User::where('user_id', $id)->firstOrFail();
            $type = "user"; 
            return view('admin.del_confirm', compact('result', 'type')); 
        }
    }

    function del_execute(Request $req, $id, $type){
        if($type == "product"){
            DB::table('product')
        ->where('product_id', $id)
        ->delete();
        Session::flash('del_sp', "Đã xóa sản phẩm thành công");
        return redirect()->route('product');
        }else if($type == "user"){
            DB::table('users')
            -> where('user_id', $id)
            ->delete();
            Session::flash('del_user', "Đã xóa người dùng thành công");
            return redirect()->route('user');
        }
    }

    function add_user(){
        return view('admin.add_user');
    }

    function post_add_user(Request $req){
        $name = $req -> name;
        $email = $req -> email;
        $phone = $req -> phone;
        $pass = $req -> password;
        $role = $req -> role;
        $address =  $req -> address;
        $user = new user;
        $user ->  email = $email;
        $user -> password = Hash::make($pass);
        $user -> full_name = $name;
        $user -> address = $address;
        $user -> phone = $phone;
        $user -> save();
        Session::flash('add_user', "Đã thêm user $name thành công");
        return redirect()->route('user');
    }

    function edit_user($id){
        $user = User::where('user_id', $id)->firstOrFail();
        return view('admin.edit_user', compact('user'));
    }

    function post_edit_user(Request $req){
        $name = $req -> name;
        $phone = $req -> phone;
        $email = $req -> email;
        $pass = $req -> password;
        $address = $req -> address;
        $role = $req -> role;
        DB::table('users')
        ->where('email', $email)
        ->update([
            'email' => $email,
            'password' => Hash::make($pass),
            'full_name' => $name,
            'address' => $address,
            'phone' => $phone,
            'role' => $role
        ]);
        Session::flash('edit_user', "Đã cập nhật tài khoản $name thành công");
        return redirect()->route('user');
    }


}
