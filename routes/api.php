<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AdsController;
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
Route::group(['prefix' => 'auth'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('send_code', 'storePhone');

        Route::post('verify_phone', 'verifyPhone');

        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('user', 'getUser');
            Route::post('store_profile', 'storePrfile');

            Route::post('logout', 'logout');
        });
    });
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('store/ads', [AdsController::class, 'store']);

});
Route::get('cities', [CityController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('ads', [AdsController::class, 'index']);;
Route::get('ads/{id}', [AdsController::class, 'getAd']);;

