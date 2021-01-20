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


Route::prefix('/user')->group(function(){
    Route::post('/login', 'Api\LoginController@login');
    Route::post('/register', 'Api\RegisterController@create');
    Route::get('/all', 'UserController@index')->middleware('auth:api');
});

Route::prefix('/services')->group(function(){
    Route::get('/all', 'Api\ServiceController@index')->middleware('auth:api');
    
});