<?php

namespace App\Http\Controllers;

use App\Mail\conTract;
use App\Models\blog;
use App\Models\product;
use App\Models\categories;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class homeControllers extends Controller
{
    
    function index(){
        $product_iphone = product::where('category_id', 1)
                         ->where('quantity', '>', 0)
                         ->limit(4)
                         ->get();

        $product_watch = product::where('category_id', 4)
                        ->where('quantity', '>', 0)
                        ->limit(4)
                        ->get();

        $blog = blog::orderBy('created_at', 'desc')->limit(4)->get();
        return view('user/index', compact('product_iphone', 'product_watch', 'blog'));
    }

    function about(){
        return view('user/about');
    }

    function contract(){
        return view('user/contract');
    }

    function post_contract(Request $req){
        $auth_mail = "thachnguyenngoc2504@gmail.com";
        $email = $req -> email;
        $name = $req -> name;
        $phone = $req -> phone;
        $title = $req -> title;
        $content = $req -> content;
        Mail::to($auth_mail)->send(new conTract($email, $name, $phone, $title, $content));

        Session::flash('thanks', "Cảm ơn bạn đã đặt câu hỏi cho chúng tôi");
        return redirect()->back();
    }

    function blog(){
        $side_show = null;
        $blog = blog::paginate(10);

        return view('user/blog', compact('blog', 'side_show'));
    }

    function find_blog(Request $req){
        $side_show = "search";
        $blog_find = blog::where('title', 'LIKE', '%' . $req->keyword . '%')->paginate(10);

        return view('user/blog', compact('blog_find', 'side_show'));
    }

    function blog_detail($slug){
        $blog = blog::where('slug', $slug)->first();
        $lastedBlog = Blog::latest('created_at')->take(3)->get(); 

        return view('user/detail_blog', compact('blog', 'lastedBlog'));
    }

    function hot(){
        $products = product::where('hot', 1)->paginate(9);
        return view('user.hot_product', compact('products'));
    }

    function check_voucher(Request $req){
        $voucherCode = $req->input('voucherCode');
    
        $validVoucher = Voucher::where('code', $voucherCode)
            ->where('expiry_date', '>=', now())
            ->where('quantity', '>', 0)
            ->first();
        
        if ($validVoucher) {
            return response()->json([
                'valid' => true,
                'discount' => $validVoucher->discount_amount
            ]);
        } else {
            return response()->json([
                'valid' => false
            ]);
        }
    
    }

    function shop($type){
        $product_iphone = product::where('category_id', 1)
                        ->where('quantity', '>', 0)
                        ->get();

        $product_mac = product::where('category_id', 2)
                        ->where('quantity', '>', 0)
                        ->get();

        $product_ipad = product::where('category_id', 3)
                        ->where('quantity', '>', 0)
                        ->get();

        $product_watch = product::where('category_id', 4)
                        ->where('quantity', '>', 0)
                        ->get();

        $product_airpod = product::where('category_id', 5)
                        ->where('quantity', '>', 0)
                        ->get();
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
        $product = DB::table('product')
        ->leftJoin('evaluate', 'product.product_id', '=', 'evaluate.product_id')
        ->leftJoin('users', 'users.user_id', '=', 'evaluate.user_id')
        ->where('slug', $slug)
        ->select([
            'product.*',
            'evaluate.content',
            'evaluate.start',
            'users.full_name',
        ])
        ->get();

        
        $name_product = product::where('slug', $slug)->first();
        $recomment = Product::where('name', $name_product->name)
        ->where('color', $name_product->color)
        ->where('storage', '!=', $name_product->storage) 
        ->where('product_id', '!=', $name_product->product_id)      
        ->limit(4)
        ->get();

        return view('user/detail', compact('product', 'recomment'));
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
                "product_id"=>$product->product_id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image 
            ];
        }

       
    
        Session::put('cart', $cart);
    
        // return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');

        return view('user.cart', compact('product'));
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
    public function allProducts(Request $request, string $type=null,string $slug=null)
    {
        // $products = Product::all();
        // return view('user.shop', compact('products'));
        $products = Product::query(); // Start with a clean query builder

        if(!empty($request->get('keyword'))) {

            $products = $products->where('name', 'like', '%'.$request->get('keyword').'%');
        }
        
        
        if(!empty($type)&&!empty($slug)) {
            if($type=='loai'){
                $category = categories::where('slug','=',$slug)->first();
                
                $products->where('category_id','=',$category->category_id);
                
            }


            if ($type == 'fillter') {
                
                switch ($slug) {

                    case 'name_asc':
                        $products->orderBy('name', 'asc');

                        break;
                    case 'name_desc':
                        $products->orderBy('name', 'desc');
                        break;
                    case 'price_asc':
                        $products->orderBy('price', 'asc');
                        break;
                    case 'price_desc':
                        $products->orderBy('price', 'desc');
                        break;
                        case 'less_than_5000000':
                            $products->where('price', '<', 5000000);
                            break;
                        case 'less_than_10000000':
                            $products->where('price', '<', 10000000);
                            break;
                        case 'less_than_20000000':
                            $products->where('price', '<', 20000000);
                            break;
                        case 'less_than_30000000':
                            $products->where('price', '<', 30000000);
                            break;
                    

                }

                
                
            }

            
            // $categories = $categories->where('name', 'like', '%'.$request->get('keyword').'%');
        }

       // Order by rank in ascending order
        // $categories = $categories->orderBy('rank', 'asc');

        // Paginate with 10 items per page
        $products = $products->paginate(12);

        return view("user.shop", compact('products'));
    }

    //----------------------------------------LOC SP---------------------------------------------------------------
    // public function filterProducts(Request $request)
    // {
    //     $query = Product::query();

    //     // Lọc theo danh mục
    //     if ($request->has('category_id') && $request->category_id != '') {
    //         $query->where('category_id', $request->category_id);
    //     }

    //     // Lọc theo khoảng giá
    //     if ($request->has('price_range') && $request->price_range != '') {
    //         switch ($request->price_range) {
    //             case 'less_than_5000000':
    //                 $query->where('price', '<', 5000000);
    //                 break;
    //             case 'less_than_10000000':
    //                 $query->where('price', '<', 10000000);
    //                 break;
    //             case 'less_than_20000000':
    //                 $query->where('price', '<', 20000000);
    //                 break;
    //             case 'less_than_30000000':
    //                 $query->where('price', '<', 30000000);
    //                 break;
    //         }
    //     }

    //     //lọc tên sp
    //     if ($request->has('keyword') && $request->keyword != '') {
    //         $query->where('name', 'like', '%' . $request->keyword . '%');
    //     }
    //     //phân loại sp
    //     if ($request->has('sort') && $request->sort != '') {
    //         switch ($request->sort) {
    //             case 'name_asc':
    //                 $query->orderBy('name', 'asc');
    //                 break;
    //             case 'name_desc':
    //                 $query->orderBy('name', 'desc');
    //                 break;
    //             case 'price_asc':
    //                 $query->orderBy('price', 'asc');
    //                 break;
    //             case 'price_desc':
    //                 $query->orderBy('price', 'desc');
    //                 break;

    //         }
    //     }
    

    //     $products = $query->get();

    //     return view('user/shop', compact('products'));
    // }
    public function filterProducts(Request $request, $slug)
    {
        $category = categories::where('slug', $slug)->firstOrFail();
        
        $query = Product::query();

        // Lọc theo danh mục
        // $query->where('category_id', $category->category_id);

         // Lọc theo danh mục sử dụng slug hoặc category_id
        if ($slug) {
            $category = Categories::where('slug', $slug)->first();
            if ($category) {
                $query->where('category_id', $category->category_id);
            } else {
                // Nếu không tìm thấy category với slug, có thể xử lý lỗi ở đây hoặc hiển thị tất cả sản phẩm
                return view('user/shop', ['products' => collect([])]);
            }
        } elseif ($request->has('category_id') && $request->category_id != '') {
            // Lọc theo category_id nếu không có slug
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo khoảng giá
        if ($request->has('price_range') && $request->price_range != '') {
            switch ($request->price_range) {
                case 'less_than_5000000':
                    $query->where('price', '<', 5000000);
                    break;
                case 'less_than_10000000':
                    $query->where('price', '<', 10000000);
                    break;
                case 'less_than_20000000':
                    $query->where('price', '<', 20000000);
                    break;
                case 'less_than_30000000':
                    $query->where('price', '<', 30000000);
                    break;
            }
        }

        

        // Lọc tên sản phẩm
        if ($request->has('keyword') && $request->keyword != '') {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // Phân loại sản phẩm
        if ($request->has('sort') && $request->sort != '') {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        $products = $query->get();

        return view('user/shop', compact('products'));
    }
}


