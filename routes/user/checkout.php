<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::prefix('checkout')->group(function () {
Route::get('/', [CheckoutController::class, 'showCheckout'])->name('scheckout');
});
