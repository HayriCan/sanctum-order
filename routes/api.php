<?php

use App\Discount\Controllers\DiscountController;
use App\Order\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/calculate-discount', [DiscountController::class, 'getDiscount']);

Route::group(['prefix' => 'orders'], function () {
    Route::post('/', [OrderController::class, 'create']);
    Route::get('/', [OrderController::class, 'index']);
    Route::delete('/{id}/delete', [OrderController::class, 'destroy']);
});
