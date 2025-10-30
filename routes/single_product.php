<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SingleProductController;
Route::get('/',[SingleProductController::class,'index'])->name('single');