<?php

use Illuminate\Support\Facades\Route;
use App\Src\Admin\Products\Controllers\ItemController;
use App\Src\Admin\Products\Controllers\CategoryController;
use App\Src\Admin\Products\Controllers\ItemStoreController;

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
Route::get("items-stores/metaData", [ItemStoreController::class,'metaData']);
Route::apiResources([
    'items' => ItemController::class,
    'categories' => CategoryController::class,
    'items-stores'=>ItemStoreController::class,
]);
