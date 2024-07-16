<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\adminController;
use App\Http\Controllers\homeControllers;
use App\Http\Controllers\userControllers;
// ========================= Route SITE ================================

Route::get('/', [homeControllers::class, 'index'])->name('index');
Route::get('/ve-chung-toi', [homeControllers::class, 'about']);
Route::get('/lien-he', [homeControllers::class, 'contract']);
Route::get('/tin-tuc', [homeControllers::class, 'blog']);
Route::get('/san-pham', [homeControllers::class, 'allProducts'])->name('products.all');
Route::get('/san-pham/filter', [homeControllers::class, 'filterProducts'])->name('products.filter');
Route::get('/tim-kiem', [homeControllers::class, 'search']);
Route::get('/dang-nhap', [homeControllers::class, 'login']);
Route::get('/dang-ky', [homeControllers::class, 'register']);
Route::get('/quen-mat-khau', [homeControllers::class, 'forgot']);

Route::get('shop/{type}', [homeControllers::class, 'shop'])->name('shop');
Route::get('cart/add/{id}', [homeControllers::class, 'addToCart'])->name('cart.add');
Route::get('cart/remove/{id}', [homeControllers::class, 'removeFromCart'])->name('cart.remove');



//  có thông số chờ chuyền vào
Route::get('/chi-tiet/{slug}', [homeControllers::class, 'detail']);
Route::get('/gio-hang', [homeControllers::class, 'cart']);
Route::get('/thanh-toan', [homeControllers::class, 'checkout'])->name('checkout');


// post-1 sau này thay thế thành tên bài viết
Route::get('/post-1', [homeControllers::class, 'single_post']);



// ===================== User Route ============================
Route::post('/post_register', [userControllers::class, 'register']);
Route::post('/post_login', [userControllers::class, 'login']);
Route::post('/xac-thuc-tai-khoan', [userControllers::class, 'confirm']);
Route::get('/mat-khau-moi/{email}/{token}', [userControllers::class, 'reset_pass'])->name('reset_pass');
Route::get('/dang-xuat', [userControllers::class, 'logout']);
Route::post('/post_createpass', [userControllers::class, 'createpass']);

// ============== ROUTE ADMIN =================
Route::prefix('admin')->middleware('is_admin')->group(function () {
        Route::get('/index', [adminController::class, 'index'])->name('dashboard');
        Route::get('/category', [adminController::class, 'category'])->name('category');
        Route::get('/product', [adminController::class, 'product'])->name('product');
        Route::get('/user', [adminController::class, 'user'])->name('user');
        Route::get('/voucher', [adminController::class, 'voucher'])->name('voucher');
        Route::get('/order', [adminController::class, 'order'])->name('order');
        Route::get('/addproduct', [adminController::class, 'add_product'])->name('add_product');
        Route::post('/post_add_sp', [adminController::class, 'post_add_product']);
        Route::get('/edit_sp/{id}', [adminController::class, 'edit_product'])->name('edit_product');
        Route::post('/post_edit_sp/{id}', [adminController::class, 'post_edit_product'])->name('post_edit_product');
        Route::get('/del_confirm/{id}/{type}', [adminController::class, 'del_confirm'])->name('del_confirm');
        Route::post('/post_del_exeute/{id}', [adminController::class, 'del_execute'])->name('del_execute');
    });
?>