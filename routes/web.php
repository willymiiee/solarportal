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

Route::prefix('participant')->namespace('Participant')->middleware('participant')->group(function () {
    Route::get('/', 'HomeController@index')->name('participant.dashboard');

    Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/profile-password', 'ProfileController@password')->name('profile.password');
    Route::put('/profile-password', 'ProfileController@updatePassword')->name('profile.updatePassword');

    Route::get('/companies/invite', 'CompanyController@invite')->name('participant.company.invite');
    Route::put('/companies/invite-process', 'CompanyController@inviteProcess')->name('participant.company.inviteProcess');
    Route::resource('companies', 'CompanyController', ['names' => [
        'index' => 'participant.company.index',
        'create' => 'participant.company.create',
        'store' => 'participant.company.store',
        'edit' => 'participant.company.edit',
        'update' => 'participant.company.update',
        'destroy' => 'participant.company.destroy',
    ]]);

    /* Coming Soon */
    Route::get('products', function () {
        return view('participant::coming_soon');
    });
    Route::get('customers', function () {
        return view('participant::coming_soon');
    });
    Route::get('hours', function () {
        return view('participant::coming_soon');
    });
    /* End Coming Soon */
});

Route::prefix('companies')->group(function () {
    Route::get('/', 'CompanyController@index')->name('company.index');
    Route::get('/{slug}', 'CompanyController@show')->name('company.show');
    Route::post('/{slug}/send-message', 'CompanyController@sendMessage')->name('company.sendMessage');
});

Route::get('/', 'HomeController@index');
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
