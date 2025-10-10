<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('flot')->group(function () {
Route::get('/', [AdminController::class, 'showFlotChart'])->name('flot');
});
