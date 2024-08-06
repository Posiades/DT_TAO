<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\orderdetail;
use App\Models\orders;
use App\Models\product;
use App\Models\User;
use App\Models\voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    function index(){
        $product = DB::table('product')
        ->join('categories', 'product.category_id', '=', 'categories.category_id')
        ->select('product.*', 'categories.name as category_name')
        ->get();
        $user = user::paginate(5);
        $order = orders::paginate(5);
        $orderdetail = orderdetail::all();
        return view('admin/index', compact('user', 'order', 'orderdetail'));
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
        $order = DB::table('orders')
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

return view('admin/order', compact('order'));       
    }

    function add_product(){
        return view('admin/add_product');   
    }

    function post_add_product(Request $req){
            function remove_accent($string){
                $string = str_replace(' ', '-', $string);
                return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
            }
        $type_sp = $req -> option;
        $name = $req -> name;
        $configtion = $req -> configtion;
        $color = $req -> color;
        $status = $req -> status;
        $storage = $req -> storage;
        $slug = str_replace(' ', '-', $name).'-'.remove_accent($color).'-'.$storage;
        $price = $req -> price;
        $mota = $req -> mota;
        $img = $req -> image;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
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
        $product -> configtion = $configtion;
        $product -> description = $mota;
        $product -> image = $img;
        $product -> storage = $storage;
        $product -> color = $color;
        $product -> price = $price;
        $product -> slug = $slug;
        $product -> quantity = $quantity;
        $product -> status = $status;
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
        $img = $req -> image;
        $color = $req -> color;
        $storage = $req -> storage;
        $configtion = $req -> configtion;
        $status = $req -> status;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
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
            'image' => $img,
            'storage' => $storage,
            'color' => $color,
            'price' => $price,
            'slug' => $slug,
            'quantity' => $quantity,
            'status' => $status
        ]);

        Session::flash('edit_sp', "Đã cập nhật thành công sản phẩm $name thành công");
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
        }else if($type == "order"){
            $result = orders::findOrFail($id);
            $type = "order";
            return view('admin.del_confirm', compact('result', 'type'));
        }else if($type == "category"){
            $result = categories::where('category_id', $id)->firstOrFail();
            $type = "category";
            return view('admin.del_confirm', compact('result', 'type'));
        }else
            $result = voucher::findOrFail($id);
            $type = "voucher";
            return view('admin.del_confirm', compact('result', 'type'));
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
        }else if($type == "order"){
            DB::table('order_detail')
            ->where('order_id', $id)
            ->delete();
            DB::table('orders')
            ->where('order_id', $id)
            ->delete();
            Session::flash('del_order', "Đã xóa đơn hàng thành công");
            return redirect()->route('admin_order');
        }else if($type == "category"){
            DB::table('categories')
            ->where('category_id', $id)
            ->delete();
            Session::flash('del_category', 'Đã xóa danh mục thành công');
            return redirect()->route('category');
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
        $user -> role = $role;
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
        $money = $req -> money;
        $create = $req -> create;
        $end = $req -> end;
        $id_product = $req -> id_product;
        $id_user = $req -> id_user;
        $id_category = $req -> id_category;
        if($id_category == 0){
            $id_category = null;
        }

        $quantity = $req -> quantity;

        $voucher = new voucher;
        $voucher -> code = $code;
        $voucher -> discount_amount = $money;
        $voucher -> create_date = $create;
        $voucher -> expiry_date = $end;
        $voucher -> quantity = $quantity;
        $voucher -> product_id = $id_product;
        $voucher -> user_id = $id_user;
        $voucher -> category_id = $id_category;
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
        $id_product = $req -> id_product;
        $id_user = $req -> id_user;
        $id_category = $req -> id_category;
        $quantity = $req -> quantity;

        DB::table('voucher')
        ->where('voucher_id', $id)
        ->update([
            'code' => $code,
            'discount_amount' => $money,
            'create_date' => $create,
            'expiry_date' => $end,
            'quantity' => $quantity,
            'product_id' => $id_product,
            'user_id' => $id_user,
            'category_id' => $id_category
        ]);
        Session::flash('edit_voucher', "Đã cập nhật voucher $code thành công");
        return redirect()->route('voucher');
    }

    function  add_order(){
        return view('admin.add_order');
    }

    function post_add_order(Request $req){
        $id_user = $req -> user_id;
        $id_product = $req -> product_id;
        $date_create = $req -> order_date;
        $quantity = $req -> quantity;
        $price = $req -> price;
        $status = $req -> status;
            if($status == 1){
                $status = "Chưa thanh toán";
            }else{$status = "Đã Thanh Toán";}

            $order = new orders;
            $order -> user_id = $id_user;
            $order -> order_date = $date_create;
            $order -> status = $status;
            $order -> save();
            $order_id = Orders::where([
                ['user_id', '=', $id_user],
                ['order_date', '=', $date_create]
            ])->first();

            $order_detail = new orderdetail;
            $order_detail -> order_id = $order_id->order_id;
            $order_detail -> product_id = $id_product;
            $order_detail -> quantity = $quantity;
            $order_detail -> price = $price;
            $order_detail -> save();
            Session::flash('add_order', "Đã Thêm đơn hàng thành công");
            return redirect()->route('admin_order');
        
    }

    function edit_order(){
        $order = DB::table('orders')
        ->join('order_detail', 'orders.order_id', '=', 'order_detail.order_id') 
        ->join('product', 'order_detail.product_id', '=', 'product.product_id') 
        ->join('users', 'orders.user_id', '=', 'users.user_id')
        ->select([
                'orders.*',
                'order_detail.order_detail_id',
                'order_detail.product_id',
                'order_detail.price',
                'order_detail.quantity',
                'users.user_id',
        ])
        ->first();
        return view('admin.edit_order', compact('order'));
    }

    function post_edit_order(Request $req){
        $id = $req -> id;
        $detail_id = $req -> detail_id;
        DB::table('orders')
        ->where('order_id', $id)
        ->update([
            'user_id' => $req -> user_id,
            'order_date' => $req -> order_date,
            'status' => $req -> status
        ]);
        DB::table('order_detail')
        ->where('order_detail_id', $detail_id)
        ->update([
            'product_id' => $req -> product_id,
            'quantity' => $req -> quantity,
            'price' => $req -> price
        ]);
        Session::flash('edit_order', "Đã cập nhật đơn hàng thành cônh");
        return redirect()->route('admin_order');
    }

    function add_category(){
        return view('admin.add_category');
    }

    function post_add_category(Request $req){
        $category = new categories;
        $category -> name = $req -> name;
        $category -> save();

        Session::flash('add_category', "Đã thêm Danh Mục $req->name thành công");
        return redirect()->route('category');
    }

    function edit_category($id){
        $category = categories::where('category_id', $id)->firstOrFail();
        return view('admin.edit_category', compact('category'));
    }

    function post_edit_category(Request $req){
        $id = $req -> id;
        DB::table('categories')
        ->where('category_id', $id)
        ->update([
            'name' => $req -> name
        ]);

        Session::flash('edit_category', "Đã cập nhật danh mục $req->name thành công");
        return redirect()->route('category');
    }
    
}
