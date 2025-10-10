<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('login')->group(function () {
Route::get('/', [AdminController::class, 'showLogin'])->name('login');
});
