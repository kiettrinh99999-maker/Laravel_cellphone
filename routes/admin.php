<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Các route dành cho admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'showDashboard'])->name('admin');

    Route::get('/flot', [AdminController::class, 'showFlotChart'])->name('flot');
    Route::get('/moris', [AdminController::class, 'showMorisChart'])->name('moris');
    Route::get('/table', [AdminController::class, 'showTable'])->name('table');

    Route::get('/forms', [AdminController::class, 'showForms'])->name('forms');
    Route::get('/forms/product', [AdminController::class, 'product'])->name('forms.product');

    Route::get('/panels-wells', [AdminController::class, 'showPanelWell'])->name('panel');
    Route::get('/buttons', [AdminController::class, 'showButton'])->name('buttons');
    Route::get('/notifications', [AdminController::class, 'showNotifi'])->name('noti');
    Route::get('/typography', [AdminController::class, 'showTypo'])->name('typo');
    Route::get('/icons', [AdminController::class, 'showIcons'])->name('icons');
    Route::get('/grid', [AdminController::class, 'showGrid'])->name('grid');
    Route::get('/blank', [AdminController::class, 'showBlank'])->name('blank');
});

// Route login (ngoài prefix)
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
