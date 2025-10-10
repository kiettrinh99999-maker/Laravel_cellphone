<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('moris')->group(function () {
    Route::get('/', [AdminController::class, 'showMorisChart'])->name('moris');
});
