<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('notifications')->group(function () {
    Route::get('/', [AdminController::class, 'showNotifi'])->name('noti');
});
