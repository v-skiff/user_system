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

Route::get('/', 'Auth\LoginController@loginForm');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => ['auth', 'verified.user']], function() {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', 'Auth\LoginController@loginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/login_2', 'Auth\LoginController@login_2');
    Route::post('/login_2', 'Auth\LoginController@loginByCode');
    Route::get('/register', 'Auth\RegisterController@registerForm');
    Route::post('/register', 'Auth\RegisterController@register');
});
