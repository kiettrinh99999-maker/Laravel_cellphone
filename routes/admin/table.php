<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('table')->group(function () {
        Route::get('/', [AdminController::class, 'showTable'])->name('table');
        Route::get('/product', [AdminController::class, 'showTableProduct'])->name('table.product');
        Route::get('/category', [AdminController::class, 'showTableCategory'])->name('table.category');
        Route::get('/user', [AdminController::class, 'showTableUser'])->name('table.user');
});
