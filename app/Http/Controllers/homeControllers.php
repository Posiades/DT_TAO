<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
            return view('user/shop', compact('product'));
        }else if($type == "airpods"){
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

    function forgot(){
        return view('user/forgotpass');
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

    //--------------------------------------------------CART--------------------------------------------------------------
    public function addToCart($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        $cart = Session::get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image // Đảm bảo bạn có thuộc tính 'image_url' trong model Product của bạn
            ];
        }
    
        Session::put('cart', $cart);
    
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
    }
    
    public function removeFromCart($id)
    {
        $cart = Session::get('cart');
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
    
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    }

    public function updatecart(Request $request)
{
    if($request->id && $request->quantity) {
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        return response()->json(['success' => true, 'total' => $this->getCartTotal()]);
    }
}

private function getCartTotal()
{
    $total = 0;
    $cart = session()->get('cart');
    foreach($cart as $details) {
        $total += $details['price'] * $details['quantity'];
    }
    return number_format($total);
}
//--------------------------------------------PRODUCT--------------------------------------------------------------
    public function allProducts()
    {
        $products = Product::all();
        return view('user/shop', compact('products'));
    }

    //----------------------------------------LOC SP---------------------------------------------------------------
    public function filterProducts(Request $request)
    {
        $query = Product::query();

        // Lọc theo danh mục
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo khoảng giá
        if ($request->has('price_range') && $request->price_range != '') {
            switch ($request->price_range) {
                case 'less_than_5000000':
                    $query->where('price_difference', '<', 5000000);
                    break;
                case 'less_than_10000000':
                    $query->where('price_difference', '<', 10000000);
                    break;
                case 'less_than_20000000':
                    $query->where('price_difference', '<', 20000000);
                    break;
                case 'less_than_30000000':
                    $query->where('price_difference', '<', 30000000);
                    break;
            }
        }

        //lọc tên sp
        if ($request->has('keyword') && $request->keyword != '') {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }
        //phân loại sp
        if ($request->has('sort') && $request->sort != '') {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price_difference', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price_difference', 'desc');
                    break;

            }
        }
    

        $products = $query->get();

        return view('user/shop', compact('products'));
    }
}


