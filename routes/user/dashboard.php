<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbroadController;


// Các route dành cho người dùng (user)
Route::get('/', [DashbroadController::class, 'home'])->name('home');

