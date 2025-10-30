<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


Route::prefix('table')->group(function () {
        Route::get('/', [AdminController::class, 'showTable'])->name('table');

        //product
        Route::get('/product', [AdminController::class, 'showTableProduct'])->name('table.product');

        //category
        Route::get('/category/{page_number?}', [CategoryController::class, 'getForm'])->name('table.category');
        // Route::get('/category', [CategoryController::class, 'getForm'])->name('table.category');

        //users
        Route::get('/user', [AdminController::class, 'showTableUser'])->name('table.user');
});
