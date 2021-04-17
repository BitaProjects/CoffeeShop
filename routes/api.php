<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::get('/viewMenu', 'api\v1\apiController@viewMenu');
    Route::post('/login', 'api\v1\apiController@login');
    Route::post('/register', 'api\v1\apiController@register');
});


Route::middleware('jwt.auth')->prefix('v1')->group(function () {
    Route::post('/order', 'api\v1\apiController@order');
    Route::post('/changeOrder', 'api\v1\apiController@changeOrder');
    Route::post('/cancelOrder/{orderID}', 'api\v1\apiController@cancelOrder');
    Route::post('/viewOrders', 'api\v1\apiController@viewOrders');
});