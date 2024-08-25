<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Controllers\adminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\homeControllers;
use App\Http\Controllers\userControllers;
use App\Http\Controllers\VnpayController;
use App\Http\Controllers\clientController;
use App\Http\Middleware\Admin;
use GuzzleHttp\Client;

// ========================= Route SITE ================================

Route::get('/', [homeControllers::class, 'index'])->name('index');
Route::get('/', [homeControllers::class, 'index'])->name('index');
    
Route::get('/ve-chung-toi', [homeControllers::class, 'about']);
Route::get('/lien-he', [homeControllers::class, 'contract'])->name('contract');
Route::post('/post-lien-he', [homeControllers::class, 'post_contract'])->name('post_contract');
Route::get('/tin-tuc', [homeControllers::class, 'blog']);
Route::get('/san-pham-ban-chay', [homeControllers::class, 'hot']);
Route::get('/san-pham/{type?}/{slug?}', [homeControllers::class, 'allProducts'])->name('products.all');

// Route::get('/san-pham/filter', [homeControllers::class, 'filterProducts'])->name('products.filter');
// Route::get('/san-pham/filter/{slug}', [homeControllers::class, 'filterProducts'])->name('products.filter');

Route::get('/tim-kiem', [homeControllers::class, 'search']);
Route::get('/dang-nhap', [homeControllers::class, 'login']);
Route::get('/dang-ky', [homeControllers::class, 'register']);
Route::get('/quen-mat-khau', [homeControllers::class, 'forgot']);

Route::get('shop/{type}', [homeControllers::class, 'shop'])->name('shop');
Route::get('cart/add/{id}', [homeControllers::class, 'addToCart'])->name('cart.add');
Route::get('cart/remove/{id}', [homeControllers::class, 'removeFromCart'])->name('cart.remove');
Route::post('cart/update', [homeControllers::class, 'updatecart'])->name('cart.update');
Route::post('/vnpay_payment', [VnpayController::class, 'vnpayPayment'])->name('vnpay.payment');
Route::get('/vnpay-return', [VnpayController::class, 'vnpayReturn']);

//  có thông số chờ chuyền vào
Route::get('/chi-tiet/{slug}', [homeControllers::class, 'detail'])->name('detail');
Route::get('/gio-hang', [homeControllers::class, 'cart']);
Route::get('/thanh-toan', [homeControllers::class, 'checkout'])->name('checkout');

Route::post('/check-voucher', [homeControllers::class, 'check_voucher']);

// route bài viết
Route::get('/tin-tuc/{slug}', [homeControllers::class, 'blog_detail'])->name('blog_detail');
Route::get('tin-tuc-tim-kiem/', [homeControllers::class, 'find_blog'])->name('find_blog');




// ===================== User Route ============================
Route::post('/post_register', [userControllers::class, 'register']);
Route::post('/post_login', [UserControllers::class, 'login'])->name('login');
Route::post('/xac-thuc-tai-khoan', [userControllers::class, 'confirm']);
Route::get('/mat-khau-moi/{email}/{token}', [userControllers::class, 'reset_pass'])->name('reset_pass');
Route::get('/dang-xuat', [userControllers::class, 'logout'])->name('logout');
Route::post('/post_createpass', [userControllers::class, 'createpass']);

// ============== ROUTE ADMIN =================

Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/index', [adminController::class, 'index'])->name('admin_index');
        Route::get('/category', [adminController::class, 'category'])->name('category');
        Route::get('/product', [adminController::class, 'product'])->name('product');
        Route::get('/user', [adminController::class, 'user'])->name('user');
        Route::get('/voucher', [adminController::class, 'voucher'])->name('voucher');
        Route::get('/order', [adminController::class, 'order'])->name('admin_order');
        Route::get('/addproduct', [adminController::class, 'add_product'])->name('add_product');
        Route::post('/post_add_sp', [adminController::class, 'post_add_product'])->name('post_add_product');
        Route::get('/edit_sp/{id}', [adminController::class, 'edit_product'])->name('edit_product');
        Route::post('/post_edit_sp/{id}', [adminController::class, 'post_edit_product'])->name('post_edit_product');
        Route::get('/del_confirm/{id}/{type}', [adminController::class, 'del_confirm'])->name('del_confirm');
        Route::post('/post_del_exeute/{id}/{type}', [adminController::class, 'del_execute'])->name('del_execute');
        Route::get('/adduser', [adminController::class, 'add_user'])->name('add_user');
        Route::post('/post_add_user', [adminController::class, 'post_add_user'])->name('post_add_user');
        Route::get('/edit_user/{id}', [adminController::class, 'edit_user'])->name('edit_user');
        Route::post('/post_edit_user', [adminController::class, 'post_edit_user'])->name('post_edit_user');
        Route::get('/add_voucher', [adminController::class, 'add_voucher'])->name('add_voucher');
        Route::post('/post_add_voucher', [adminController::class, 'post_add_voucher'])->name('post_add_voucher');
        Route::get('/edit_voucher/{id}', [adminController::class, 'edit_voucher'])->name('edit_voucher');
        Route::post('/post_edit_voucher', [adminController::class, 'post_edit_voucher'])->name('post_edit_voucher');
      
        Route::get('/add_order', [adminController::class, 'add_order'])->name('add_order');
        Route::post('/post_add_order', [adminController::class, 'post_add_order'])->name('post_add_order');
        Route::get('/edit_order/{id}', [adminController::class, 'edit_order'])->name('edit_order');
        Route::post('/post_edit_order', [adminController::class, 'post_edit_order'])->name('post_edit_order');

        Route::get('/add_category', [adminController::class, 'add_category'])->name('add_category');
        Route::post('/post_add_category', [adminController::class, 'post_add_category'])->name('post_add_category');
        Route::get('/edit_category/{id}', [adminController::class, 'edit_category'])->name('edit_category');
        Route::post('/post_edit_category', [adminController::class, 'post_edit_category'])->name('post_edit_category');

        Route::get('/blog', [adminController::class, 'blog'])->name('blog');
        Route::get('/add_blog', [adminController::class, 'add_blog'])->name('add_blog');
        Route::post('/post_add_blog', [adminController::class, 'post_add_blog'])->name('post_add_blog');
        Route::get('/edit_blog/{id}', [adminController::class, 'edit_blog'])->name('edit_blog');
        Route::post('/post_edit_blog', [adminController::class, 'post_edit_blog'])->name('post_edit_blog');

        Route::get('/product/filter/{type}', [adminController::class, 'product_filter'])->name('product_filter');
        
        Route::get('/ip_analytic', [adminController::class, 'ipv4_analytic'])->name('ipv4');
        Route::get('/ip_analytic/{time}', [adminController::class, 'ipv4_analytic_time'])->name('ipv4_filter');

        Route::get('/product/tim-kiem', [adminController::class, 'search_product'])->name('product_search');
});



Route::prefix('client')->middleware('client')->group(function (){
    Route::get('/info', [clientController::class, 'info'])->name('client.index');
    Route::get('/edit-info', [clientController::class, 'edit_info'])->name('edit_info');
    Route::post('/post_edit_info/{id}', [clientController::class, 'post_edit_info'])->name('post_edit_info');
    Route::get('/order', [clientController::class, 'order'])->name('order');
    Route::get('/contract', [clientController::class, 'contract'])->name('client_contract');
    Route::post('/post-lien-he', [clientController::class, 'post_contract'])->name('client_post_contract');
});


// =============== API ROUTE ====================

Route::prefix('api')->group(function (){
    Route::get('/iphone', [apiController::class, 'api_iphone']);
    Route::get('/mac', [apiController::class, 'api_mac']);
    Route::get('/ipad', [apiController::class, 'api_ipad']);
    Route::get('/watch', [apiController::class, 'api_watch']);
    Route::get('/airpods', [apiController::class, 'api_airpods']);
    Route::post('/log-visit', [apiController::class, 'logVisit'])->name('logVisit');

});


?>