<?php

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'UserController@login')->name('login');
    Route::post('/', 'UserController@loginProcess');
});

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', 'UserController@logout')->name('logout');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('items', 'ItemController');
    Route::resource('purchases', 'PurchaseController');
    Route::resource('sales', 'SaleController');

    Route::get('report/day', 'ReportController@day')->name('sales.day');
    Route::get('report/month', 'ReportController@month')->name('sales.month');
    Route::get('report/year', 'ReportController@year')->name('sales.year');
});
