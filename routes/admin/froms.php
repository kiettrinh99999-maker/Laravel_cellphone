<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;


Route::prefix('forms')->group(function () {
    // config route add product
    Route::get('/product', [ProductController::class, 'getForm'])->name('forms.product');
    Route::get('/product/{id}/edit',[ProductController::class, 'update'])->name('edit.product');
    Route::post('/product', [ProductController::class,'postForm'])->name('post.product');
    Route::post('/product/update', [ProductController::class,'postForm'])->name('update.product');
    
    // config route add category

    Route::get('/category', [CategoryController::class, 'getForm'])->name('forms.category');
    Route::post('/category', [CategoryController::class, 'getForm'])->name('forms.category');

});
