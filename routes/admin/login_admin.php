<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;

// Route::get('/login', [LoginAdminController::class, 'showLogin'])->name('formLogin');
Route::post('/login',[LoginAdminController::class, 'postLogin'])->name('postLogin');
