<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('logind')->group(function () {
    Route::get('/', [AdminController::class, 'showLogin'])->name('loginAdmin');
    Route::post('/', [AdminController::class, 'login'])->name('loginPost');
});
