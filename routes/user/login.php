<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Các route dành cho người dùng (user)
Route::get('/login', [AuthController::class, 'login'])->name('login');