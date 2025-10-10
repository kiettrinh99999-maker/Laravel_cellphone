<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'showContact'])->name('contact');
    Route::post('/', [ContactController::class, 'send'])
        ->name('contact.send');
});
