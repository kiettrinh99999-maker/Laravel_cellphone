<?php

use Illuminate\Support\Facades\Route;

// Gộp route của user và admin
require __DIR__ . '/user/singleProduct.php';
require __DIR__ . '/user/cart.php';
require __DIR__ . '/user/contact.php';
require __DIR__ . '/user/checkout.php';
require __DIR__ . '/user/category.php';
require __DIR__ . '/user/shopPage.php';
require __DIR__ . '/user/dashboard.php';
// require __DIR__ . '/user/admin.php';

Route::prefix('admin1')->group(function () {
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