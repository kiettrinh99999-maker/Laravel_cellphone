<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\LoginAdminController;

Route::prefix('/')->group(function(){
    require (__DIR__.'/dashboard.php');
});

Route::prefix('shop')->group(function(){
    require (__DIR__.'/shop_page.php');
});
Route::prefix('single-product')->group(function(){
    require (__DIR__.'/single_product.php');
});

Route::prefix('cart')->group(function(){
    require (__DIR__.'/cart.php');
});

Route::prefix('checkout')->group(function(){
    require (__DIR__.'/checkout.php');
});

Route::prefix('contact')->group(function(){
    require (__DIR__.'/contact.php');
});
Route::prefix('orthers')->group(function(){
    require (__DIR__.'/orthers.php');
});

    // require(__DIR__.'/admin/login_admin.php');
Route::get('admind/login', [LoginAdminController::class, 'showLogin'])->name('formLogin');
Route::post('admind/login', [LoginAdminController::class, 'postLogin'])->name('postLogin');

Route::prefix('admind')->middleware('isAdmin')->group(function(){
    require (__DIR__.'/admin/logout_admin.php');
    require (__DIR__.'/admin/dashboard.php');
    require(__DIR__.'/admin/productAdmin.php');
});
// Route::prefix('api')->middleware('isAdmin')->group(function(){
//     require (__DIR__.'/admin/dashboard.php');
//     require(__DIR__.'/admin/productAdmin.php');
// });

