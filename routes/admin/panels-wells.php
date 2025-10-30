<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('panels-wells')->group(function () {
        Route::get('/', [AdminController::class, 'showPanelWell'])->name('panel');
});
