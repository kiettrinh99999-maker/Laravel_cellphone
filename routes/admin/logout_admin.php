<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginAdminController;
Route::get('/logout',[LoginAdminController::class,'logout'])->name('logOut');