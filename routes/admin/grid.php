<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('grid')->group(function () {
    Route::get('/', [AdminController::class, 'showGrid'])->name('grid');
});
