<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('icons')->group(function () {
    Route::get('/', [AdminController::class, 'showIcons'])->name('icons');
});
