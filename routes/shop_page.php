<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopPageController;
Route::get('/',[ShopPageController::class,'index'])->name('shop');