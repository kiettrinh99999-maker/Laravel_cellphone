<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('forms')->group(function () {
    Route::get('/', [AdminController::class, 'showForms'])->name('forms');
    Route::get('/product', [AdminController::class, 'product'])->name('forms.product');
});
