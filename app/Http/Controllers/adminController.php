<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\product;
use App\Models\User;
use App\Models\product_option;
use App\Models\voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    function index(){
        $quantity_show = 5;
        $categories = categories::paginate($quantity_show);
        $product = DB::table('product')
        ->join('categories', 'product.category_id', '=', 'categories.category_id')
        ->select('product.*', 'categories.name as category_name')
        ->paginate($quantity_show);
        $user = user::paginate($quantity_show);
        $voucher = voucher::paginate($quantity_show);
        return view('admin/index', compact('categories', 'product', 'user', 'voucher'));
    }

    function category(){
        $categories = categories::all();
        return view('admin/category', compact('categories'));
    }

    function product(){
        $quantity_show = 10;
        $product = DB::table('product')
        ->join('categories', 'product.category_id', '=', 'categories.category_id')
        ->select('product.*', 'categories.name as category_name')
        ->paginate($quantity_show);
        return view('admin/product', compact('product'));
    }

    function option_product(){
        $quantity_show = 10;
        $option_product = DB::table('product_option')
        ->join('product', 'product_option.product_id', '=', 'product.product_id')
        ->select(
            'product_option.*',
            'product.name',
            'product.image_url',
            'product.color',
        
        )
        ->paginate($quantity_show);
        return view('admin/option_product', compact('option_product'));
    }

    function user(){
        $quantity_show = 10;
        $user = user::paginate($quantity_show);
        return view('admin/user', compact('user'));
    }

    function voucher(){
        $quantity_show = 10;
        $voucher = voucher::paginate($quantity_show);
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
        $color = $req -> color;
        $storage = $req -> storage;
        $configtion = $req -> configtion;
        $status = $req -> status;
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
            'configtion' => $configtion,
            'description' => $mota,
            'image_url' => $img,
            'storage' => $storage,
            'color' => $color,
            'price_difference' => $price,
            'slug' => $slug,
            'quantity' => $quantity,
            'status' => $status
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
        }else if($type == "user"){
            $result = User::where('user_id', $id)->firstOrFail();
            $type = "user"; 
            return view('admin.del_confirm', compact('result', 'type')); 
        }else if($type == "option"){
            $result = product_option::findOrFail($id);
            $type = "option";
            return view('admin.del_confirm', compact('result', 'type'));
        }else{
            $result = voucher::findOrFail($id);
            $type = "voucher";
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
        }else if($type == "voucher"){
            DB::table('voucher')
            ->where('voucher_id', $id)
            ->delete();
            Session::flash('del_voucher', "Đã xóa voucher thành công");
            return redirect()->route('voucher');
        }else if($type == "option"){
            DB::table('product_option')
            ->where('option_id', $id)
            ->delete();
            Session::flash('del_option', "Đã Xóa Option thành công");
            return redirect()->route('option_product');
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

    function add_voucher(){
       return view('admin/add_voucher');
    }

    function post_add_voucher(Request $req){
        $code = $req -> code;
        $money = $req -> value;
        $create = $req -> create;
        $end = $req -> end;
        $quantity = $req -> quantity;

        $voucher = new voucher;
        $voucher -> code = $code;
        $voucher -> discount_amount = $money;
        $voucher -> create_date = $create;
        $voucher -> expiry_date = $end;
        $voucher -> quantity = $quantity;
        $voucher->save();

        Session::flash('add_voucher', "Đã thêm voucher $code thành công");
        return redirect()->route('voucher');
    }

    function edit_voucher($id){
        $voucher = voucher::where('voucher_id', $id)->firstOrFail();
        return view('admin.edit_voucher', compact('voucher'));
    }

    function post_edit_voucher(Request $req){
        $id = $req->id;
        $code = $req -> code;
        $money = $req -> money;
        $create = $req -> create;
        $end = $req -> end;
        $quantity = $req -> quantity;

        DB::table('voucher')
        ->where('voucher_id', $id)
        ->update([
            'code' => $code,
            'discount_amount' => $money,
            'create_date' => $create,
            'expiry_date' => $end,
            'quantity' => $quantity
        ]);
        Session::flash('edit_voucher', "Đã cập nhật voucher $code thành công");
        return redirect()->route('voucher');
    }

    function edit_option($id){
        $option = product_option::findOrFail($id);
        return view('admin/edit_option', compact('option'));
    }

    function post_edit_option(Request $req){
        $id = $req -> id;
        $id_product = $req -> product_id;
        $storage = $req -> storage;
        $price = $req -> price;
        $quantity = $req -> quantity;
        $status = $req -> status;
        DB::table('product_option')
        ->where('option_id', $id)
        ->update([
            'product_id' => $id_product,
            'storage' => $storage,
            'price_difference' => $price,
            'quantity' => $quantity,
            'status' => $status
        ]);
        Session::flash('edit_option', "Đã update Option thành công");
        return redirect()->route('option_product');
    }

    function  add_order(){
        return view('admin.add_order');
    
    }
    
}
