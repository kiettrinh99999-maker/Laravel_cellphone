<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::prefix('cart')->group(function () {
Route::get('/', [CartController::class, 'showCart'])->name('scard');
});
