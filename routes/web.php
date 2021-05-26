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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    /******************Brand  ROUTES****************/
    Route::resource('brand', 'BrandController');
    /******************Model  ROUTES****************/
    Route::resource('model', 'CategoryController');
    /******************Item  ROUTES****************/
    Route::view('/', 'item.index')->name('item.view');
    Route::post('brand/models', 'ItemController@getModelsByBrand')->name('brand.models');
    Route::resource('item', 'ItemController');

});
