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
    return view('welcome');
});

Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handlerProviderCallback');

Route::get('Home', function() {
    return view('Home.index');
});

Route::get('GoogleSign', 'googlesignController@Index');

Route::post('verifyToken','googlesignController@verifyToken');