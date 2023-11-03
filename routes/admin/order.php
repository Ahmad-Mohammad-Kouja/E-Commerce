<?php


use App\Src\Admin\Products\Controllers\OrderController;

Route::controller(OrderController::class)
    ->group(function () {
        Route::get('/admin/orders' ,   'index');
        Route::get('admin/orders/{order}' , 'show');
    });
