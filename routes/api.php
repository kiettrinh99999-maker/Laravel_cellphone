<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/category', function (Request $request) {
    return "hello";
})->name('getCategories');
Route::post('/category',[CategoryController::class,'postCategoryApi'])->middleware('checkToken')->name('postCategoryApi');
