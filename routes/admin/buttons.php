<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('buttons')->group(function () {
    Route::get('/', [AdminController::class, 'showButton'])->name('buttons');
});
