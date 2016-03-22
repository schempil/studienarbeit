<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/device', 'DeviceController');
        Route::get('/device/{device}/delete', 'DeviceController@delete');
    Route::resource('/person', 'PersonController');
    Route::resource('/loan', 'LoanController');

    Route::resource('/admin/log', 'LogController');
    Route::get('/admin/restoredevices', 'DeviceController@restoreindex');
    Route::get('/admin/restoredevices/{device}', 'DeviceController@restoredevice');
    Route::resource('/admin/category', 'CategoryController');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});
