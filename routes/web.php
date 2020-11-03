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
    return redirect('/services');
});

Auth::routes();

Route::get('/user/{user}/edit', 'UserController@edit');

Route::get('/profile/{user}', 'ProfilesController@show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profiles.update');

Route::post('/order/create/{service}', 'OrdersController@create');

Route::get('/services/user/{user}', 'ServicesController@indexByUser');

Route::post('/services/reviews', 'ReviewsController@store')->name('review.store');

Route::get('/services', 'ServicesController@index')->name('services.index');
Route::get('/services/create', 'ServicesController@create')->middleware('auth');
Route::post('/services', 'ServicesController@store')->middleware('auth');
Route::get('/services/{service}', 'ServicesController@show');

Route::get('/home', 'HomeController@index')->name('home');
