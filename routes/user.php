<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\ValidateContact;

// Các route dành cho người dùng (user)
Route::get('/', [ProductsController::class, 'home'])->name('home');
Route::get('/singleproduct', [ProductsController::class, 'singleProduct'])->name('sprod');
Route::get('/shoppage', [ProductsController::class, 'shopPage'])->name('spage');

Route::get('/cart', [CartController::class, 'showCart'])->name('scard');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('scheckout');

Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware(ValidateContact::class);
