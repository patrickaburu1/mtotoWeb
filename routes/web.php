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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/register/user','WebController@registerUser');

Route::get('/register','WebController@newUser');

Route::get('/blockUser','WebController@endUsers');

//block user
Route::get('/blockUser/{id}','WebController@blockUser');