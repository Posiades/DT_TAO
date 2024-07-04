<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeControllers;

// ========================= Route SITE ================================

Route::get('/', [homeControllers::class, 'index']);
Route::get('/ve-chung-toi', [homeControllers::class, 'about']);
Route::get('/lien-he', [homeControllers::class, 'contract']);
Route::get('/tin-tuc', [homeControllers::class, 'blog']);
Route::get('/san-pham', [homeControllers::class, 'shop']);
Route::get('/tim-kiem', [homeControllers::class, 'search']);
Route::get('/dang-nhap', [homeControllers::class, 'login']);
Route::get('/dang-ky', [homeControllers::class, 'register']);

//  có thông số chờ chuyền vào
Route::get('/chi-tiet', [homeControllers::class, 'detail']);
Route::get('/gio-hang', [homeControllers::class, 'cart']);
Route::get('/thanh-toan', [homeControllers::class, 'checkout']);


// post-1 sau này thay thế thành tên bài viết
Route::get('/post-1', [homeControllers::class, 'single_post']);

?>
