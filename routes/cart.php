<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
Route::get('/',[CartController::class,'index'])->name('cart');