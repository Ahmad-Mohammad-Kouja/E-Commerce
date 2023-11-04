<?php

use App\Src\Admin\Products\Controllers\CategoryController;
use App\Src\Admin\Products\Controllers\ItemController;
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
    Route::post('items/{item}/update-image', [ItemController::class, 'updateImage']);
    Route::post('categories/{category}/update-image', [CategoryController::class, 'updateImage']);
    Route::apiResources([
        'items' => ItemController::class,
        'categories' => CategoryController::class,
    ]);
});
