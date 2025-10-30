<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;

Route::get('/', [DashboardAdminController::class, 'index'])->name('home_admin');