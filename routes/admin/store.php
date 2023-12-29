<?php

use App\Src\Admin\Store\Controllers\AdController;
use App\Src\Admin\Store\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:admin')->group(function () {
    Route::apiResource('stores', StoreController::class);
});
Route::apiResource('ads', AdController::class);
