<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateContact;
Route::get('/',[ProductsController::class,'home'] )->name('home');
Route::get('/singleproduct',[ProductsController::class,'singleProduct'] )->name('sprod');
Route::get('/shoppage',[ProductsController::class,'shopPage'] )->name('spage');
Route::get('/cart',[CartController::class,'showCart'] )->name('scard');
Route::get('/checkout',[CheckoutController::class,'showCheckout'] )->name('scheckout');
Route::get('/contact',[ContactController::class,'showContact'] )->name('contact');
Route::get('/admin1',[AdminController::class,'showDashboard'])->name('admin') ;
Route::get('/admin/flot',[AdminController::class,'showFlotChart'])->name('flot') ;
Route::get('/admin/moris',[AdminController::class,'showMorisChart'])->name('moris') ;
Route::get('/admin/table',[AdminController::class,'showTable'])->name('table') ;
Route::get('/admin/forms',[AdminController::class,'showForms'])->name('forms') ;
Route::get('/admin/panels-wells',[AdminController::class,'showPanelWell'])->name('panel') ;
Route::get('/admin/buttons',[AdminController::class,'showButton'])->name('buttons') ;
Route::get('/admin/notifications',[AdminController::class,'showNotifi'])->name('noti') ;
Route::get('/admin/typography',[AdminController::class,'showTypo'])->name('typo') ;
Route::get('/admin/icons',[AdminController::class,'showIcons'])->name('icons') ;
Route::get('/admin/grid',[AdminController::class,'showGrid'])->name('grid') ;
Route::get('/admin/blank',[AdminController::class,'showBlank'])->name('blank');
Route::get('/login',[AdminController::class,'showLogin'])->name('login');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')
->middleware(ValidateContact::class);;

