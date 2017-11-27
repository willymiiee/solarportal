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

Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::namespace('Api')->group(function() {
        Route::post('profile', 'UserController@postProfile');
        Route::post('change-password', 'UserController@postChangePassword');
        Route::post('lost-password', 'UserController@postLostPassword');
        Route::post('reset-password', 'UserController@postResetPassword');
    });
});

// routes without auth
Route::namespace('Api')->group(function() {
    Route::apiResource('articles', 'ArticleController');
});
