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

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware('admin')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');

    Route::resource('pages', 'PageController');
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');
});

Route::middleware('participant')->group(function () {
	Route::resource('participant', 'ParticipantController');
});

Route::get('/', function() { return view('tes'); });
// Route::get('/', 'HomeController@index');
Route::get('user/verify/{code}', 'UserController@getVerify');
Route::get('profile', 'UserController@getProfile');
Route::post('profile', 'UserController@postProfile');
Route::get('change-password', 'UserController@getChangePassword');
Route::post('change-password', 'UserController@postChangePassword');
Route::post('lost-password', 'UserController@postLostPassword');
Route::get('reset-password/{code}', 'UserController@getResetPassword');
Route::post('reset-password', 'UserController@postResetPassword');
Route::get('register-thankyou', 'HomeController@getThankyouRegister');
Route::get('{slug}', 'HomeController@getItem');
