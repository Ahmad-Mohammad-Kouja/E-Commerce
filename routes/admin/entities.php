<?php

use App\Src\Admin\Entities\Controllers\AuthController;

Route::prefix('auth')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login')->name('login');
        Route::delete('logout', 'logout')->name('logout')->middleware('auth:admin');
    });
