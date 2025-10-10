<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleController;

Route::prefix('singleproduct')->group(function () {
Route::get('/', [SingleController::class, 'singleProduct'])->name('sprod');
});
