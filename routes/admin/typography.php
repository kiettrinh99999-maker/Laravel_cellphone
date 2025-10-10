<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('typography')->group(function () {
    Route::get('/', [AdminController::class, 'showTypo'])->name('typo');
});
