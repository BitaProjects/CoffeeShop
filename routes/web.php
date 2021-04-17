<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//panel Routes
Route::middleware('isAdmin')->prefix('panel')->group(function () {
    Route::get('/', function () {
        return view('panel');
    });
    //users routs
    Route::get('/users','admin\usersController@index');
    Route::post('/user/store/{userId}','admin\usersController@store');
    Route::get('/users/edit/{userId}','admin\usersController@edit');

    //products routes
    Route::get('/products', 'admin\productsController@index');
    Route::post('/product/store/','admin\productsController@store');
    Route::post('/product/update/{productId}','admin\productsController@update');
    Route::get('/product/edit/{productId}','admin\productsController@edit');
    Route::get('/product/create','admin\productsController@create');

    //productOptions routes
    Route::get('/options', 'admin\optionsController@index');
    Route::post('/option/store/','admin\optionsController@store');
    Route::post('/option/update/{optionId}','admin\optionsController@update');
    Route::get('/option/edit/{optionId}','admin\optionsController@edit');
    Route::get('/option/create','admin\optionsController@create');

    //orders routs
    Route::get('/orders', 'admin\ordersController@index');
    Route::get('/order/edit/{orderId}', 'admin\ordersController@edit');
    Route::post('/order/update/{orderId}', 'admin\ordersController@update');
});
