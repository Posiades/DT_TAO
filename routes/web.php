<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControllers;
use App\Http\Controllers\adminController;
// ========================= Route SITE ================================

Route::get('/', [homeControllers::class, 'index']);
Route::get('/ve-chung-toi', [homeControllers::class, 'about']);
Route::get('/lien-he', [homeControllers::class, 'contract']);
Route::get('/tin-tuc', [homeControllers::class, 'blog']);
Route::get('/san-pham/{type}', [homeControllers::class, 'shop']);
Route::get('/tim-kiem', [homeControllers::class, 'search']);
Route::get('/dang-nhap', [homeControllers::class, 'login']);
Route::get('/dang-ky', [homeControllers::class, 'register']);

//  có thông số chờ chuyền vào
Route::get('/chi-tiet/{slug}', [homeControllers::class, 'detail']);
Route::get('/gio-hang', [homeControllers::class, 'cart']);
Route::get('/thanh-toan', [homeControllers::class, 'checkout']);


// post-1 sau này thay thế thành tên bài viết
Route::get('/post-1', [homeControllers::class, 'single_post']);




// ============== ROUTE ADMIN =================

    Route::get('/admin/index', [adminController::class, 'index']);
    Route::get('/admin/category', [adminController::class, 'category'])->name('category');
    Route::get('/admin/product', [adminController::class, 'product'])->name('product');
    Route::get('/admin/user', [adminController::class, 'user'])->name('user');
    Route::get('/admin/voucher', [adminController::class, 'voucher'])->name('voucher');
    Route::get('/admin/order', [adminController::class, 'order'])->name('order');
    Route::get('/admin/addproduct', [adminController::class, 'add_product'])->name('add_product');
    
    // Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //     // Thêm các route khác cho admin ở đây
    // });
?>
