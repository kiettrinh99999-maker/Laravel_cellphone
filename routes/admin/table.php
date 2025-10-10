<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('table')->group(function () {
        Route::get('/', [AdminController::class, 'showTable'])->name('table');
});
