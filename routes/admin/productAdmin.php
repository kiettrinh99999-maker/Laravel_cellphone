<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductAdminController;

Route::get('/form', [ProductAdminController::class, 'showForm'])->name('formProduct');
Route::post('/form',[ProductAdminController::class,'postProduct'])->name('postProduct');