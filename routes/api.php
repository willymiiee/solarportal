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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::namespace ('Api')->group(function () {
        Route::post('profile', 'UserController@postProfile');
        Route::post('change-password', 'UserController@postChangePassword');
        Route::post('lost-password', 'UserController@postLostPassword');
        Route::post('reset-password', 'UserController@postResetPassword');
    });
});

// routes without auth
Route::namespace ('Api')->as('api.')->group(function () {
    Route::apiResources([
        'articles' => 'ArticleController',
        'companies' => 'CompanyController',
        'orders' => 'OrderController',
        'payments' => 'PaymentController'
    ]);
    Route::post('snap', 'OrderController@getSnapToken')->name('snap');
    Route::get('clean-order', 'OrderController@getCleanOrder')->name('clean-order');
    Route::get('midtrans', 'PaymentController@getMidtransResult')->name('midtrans');

    Route::get('provinces', 'RegionController@getProvinces')->name('provinces');
    Route::get('provinces/{provinceId}', 'RegionController@getProvince')->name('province');
    Route::get('provinces/{provinceId}/regencies', 'RegionController@getRegencies')->name('regencies');
    Route::get('provinces/{provinceId}/regencies/{regencyId}', 'RegionController@getRegency')->name('regency');
    Route::get('provinces/{provinceId}/regencies/{regencyId}/districts', 'RegionController@getDistricts')->name('districts');
    Route::get('provinces/{provinceId}/regencies/{regencyId}/districts/{districtId}/villages', 'RegionController@getVillages')->name('villages');
    Route::get('provinces/{provinceId}/regencies/{regencyId}/districts/{districtId}/villages/{villageId}', 'RegionController@getVillage')->name('village');

    Route::post('quote', 'QuoteController@postQuote')->name('quote');
    Route::put('quote/{quoteId}', 'QuoteController@updateQuote')->name('update-quote');

    Route::post('check-user', 'UserController@getCheckUser')->name('check-user');
});
