<?php

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::prefix('companies')->group(function () {
    Route::get('/', 'CompanyController@index')->name('company.index');
    Route::get('category/{slug}', 'CompanyController@getByCategory')->name('company.category');
    Route::get('/{slug}', 'CompanyController@show')->name('company.show');
    Route::post('/{slug}/send-message', 'CompanyController@sendMessage')->name('company.sendMessage');
});

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectController@index')->name('project.index');
    Route::get('/register', 'ProjectController@create')->name('project.create');
    Route::post('/register-process', 'ProjectController@store')->name('project.store');
    Route::get('/{id}', 'ProjectController@show')->name('project.show');
});

Route::prefix('user')->as('user.')->group(function() {
    Route::get('verify/{code}', 'UserController@getVerify')->name('verify');
    Route::get('profile', 'UserController@getProfile')->name('profile');
    Route::post('profile', 'UserController@postProfile')->name('update-profile');
    Route::get('change-password', 'UserController@getChangePassword')->name('change-password');
    Route::post('change-password', 'UserController@postChangePassword')->name('update-password');
    Route::get('quotes', 'UserController@getQuotes')->name('quote.index');
});

Route::post('alternate-login', 'UserController@postAlternateLogin')->name('alternate-login');
Route::get('/', 'HomeController@index');
Route::post('lost-password', 'UserController@postLostPassword')->name('lost-password');
Route::get('reset-password/{code}', 'UserController@getResetPassword');
Route::post('reset-password', 'UserController@postResetPassword');
Route::get('register-thankyou', 'HomeController@getThankyouRegister');
Route::get('articles', 'HomeController@getArticles')->name('article.list');
Route::get('calculator', 'HomeController@getCalculator')->name('calculator');
Route::get('{slug}', 'HomeController@getItem')->name('article.detail');
