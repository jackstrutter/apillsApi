<?php

use Illuminate\Http\Request;

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



     Route::post('registerUser','API\UserController@store');

Route::group(['middleware' => 'auth:api'], function () {

    Route::resource('user','API\UserController');

    Route::put('updateUser','API\UserController@update');

    Route::resource('meds','API\MedController');
});


