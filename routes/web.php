<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\homeControllers;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userControllers;
// ========================= Route SITE ================================

Route::get('/', [homeControllers::class, 'index'])->name('index');
Route::get('/ve-chung-toi', [homeControllers::class, 'about']);
Route::get('/lien-he', [homeControllers::class, 'contract']);
Route::get('/tin-tuc', [homeControllers::class, 'blog']);
Route::get('/san-pham/{type}', [homeControllers::class, 'shop']);
Route::get('/tim-kiem', [homeControllers::class, 'search']);
Route::get('/dang-nhap', [homeControllers::class, 'login']);
Route::get('/dang-ky', [homeControllers::class, 'register']);
Route::get('/quen-mat-khau', [homeControllers::class, 'forgot']);



//  có thông số chờ chuyền vào
Route::get('/chi-tiet/{slug}', [homeControllers::class, 'detail']);
Route::get('/gio-hang', [homeControllers::class, 'cart']);
Route::get('/thanh-toan', [homeControllers::class, 'checkout']);


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
        
    });
?>
