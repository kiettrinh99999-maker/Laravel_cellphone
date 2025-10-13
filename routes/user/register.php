<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Các route dành cho người dùng (user)
Route::get('/register', [AuthController::class, 'register'])->name('register');