<?php

use App\Src\Admin\Products\Controllers\CategoryController;
use App\Src\Admin\Products\Controllers\ItemController;
use App\Src\Admin\Products\Controllers\ItemDiscountController;
use App\Src\Admin\Products\Controllers\ItemOfferController;
use App\Src\Admin\Products\Controllers\ItemStoreController;
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
    Route::patch('offers/{offer}/update-image', [ItemOfferController::class, 'updateImage']);
    Route::post('categories/{category}/update-image', [CategoryController::class, 'updateImage']);
    Route::get('items-stores/metadata', [ItemStoreController::class, 'metadata']);
    Route::apiResources([
        'items' => ItemController::class,
        'categories' => CategoryController::class,
        'items-stores' => ItemStoreController::class,
        'discounts' => ItemDiscountController::class,
        'offers' => ItemOfferController::class,
    ]);
});
