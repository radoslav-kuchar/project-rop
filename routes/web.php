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
    return redirect('/testhome');
});

Auth::routes();
Route::get('/offline', function () {    
    return view('modules/laravelpwa/offline');
});
Route::get('/user/{user}/edit', 'UserController@edit');
Route::get('/order/create/{service}', 'OrderController@create');
Route::post('/order', 'OrderController@store');
Route::get('/order/{order}', 'OrderController@show');
Route::get('/order/verify/{order}/{token}', 'OrderController@verify');
Route::get('/service/user/{user}', 'ServiceController@indexByUser');
Route::post('/review', 'ReviewController@store')->name('review.store');
Route::get('/services', 'ServiceController@index')->name('services.index');
Route::get('/service/create', 'ServiceController@create')->middleware('auth');
Route::post('/service', 'ServiceController@store');
Route::get('/service/{service}', 'ServiceController@show');
Route::get('/getuser', 'ServiceController@getUser');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', ArticleController::class);

Route::get('/test',function(){return view("auth.test");});
Route::get("/testhome",function(){return view("service.test-home");});
Route::get("/testservice",function(){return view("service.create-test");});

Route::get('/userinfo', function(){
    if(Auth::check()){
        return Auth::user();
    } 
 });
