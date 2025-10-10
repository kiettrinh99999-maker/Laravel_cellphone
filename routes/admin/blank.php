<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('blank')->group(function () {
Route::get('/', [AdminController::class, 'showBlank'])->name('blank');
});
