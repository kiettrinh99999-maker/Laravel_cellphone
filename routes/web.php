<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\ValidateContact;
use App\Http\Middleware\IsAdmin;
require __DIR__ . '/user/login.php';
require __DIR__ . '/user/register.php';
require __DIR__ . '/user/singleProduct.php';
require __DIR__ . '/user/cart.php';
require __DIR__ . '/user/contact.php';
require __DIR__ . '/user/checkout.php';
require __DIR__ . '/user/category.php';
require __DIR__ . '/user/shopPage.php';
require __DIR__ . '/user/dashboard.php';

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')
->middleware(ValidateContact::class);;



// require __DIR__ . '/user/admin.php';


// page login
// Route::get('/login', function () {
//     return view('login/login');
// });
// AJAX for login page
// Route::post('/ajax-login', [LoginController::class, 'ajaxLogin'])->name('ajax.login');




Route::prefix('admin1')->middleware(IsAdmin::class)->group(function () {
    require __DIR__ . '/admin/authen.php';
    require __DIR__ . '/admin/blank.php';
    require __DIR__ . '/admin/buttons.php';
    require __DIR__ . '/admin/dashbroad.php';
    require __DIR__ . '/admin/flot.php';
    require __DIR__ . '/admin/froms.php';
    require __DIR__ . '/admin/grid.php';
    require __DIR__ . '/admin/icons.php';
    require __DIR__ . '/admin/moris.php';
    require __DIR__ . '/admin/notifications.php';
    require __DIR__ . '/admin/panels-wells.php';
    require __DIR__ . '/admin/table.php';
    require __DIR__ . '/admin/typography.php';
});