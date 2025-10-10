<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopPageController;

Route::prefix('shoppage')->group(function () {
Route::get('/', [ShopPageController::class, 'shopPage'])->name('spage');

});
