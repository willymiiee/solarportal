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

Route::prefix('admin')->namespace('Admin')->middleware('admin')->as('admin.')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.home');
    });
    Route::get('home', 'HomeController@index')->name('home');

    Route::resources([
        'pages' => 'PageController',
        'posts' => 'PostController',
        'users' => 'UserController',
        'companies' => 'CompanyController'
    ]);

    Route::prefix('verify')->namespace('Verify')->as('verify.')->group(function () {
        Route::resources([
            'packages' => 'PackageController'
        ]);
    });
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

    Route::resource('projects', 'ProjectController', ['names' => [
        'index' => 'participant.project.index',
        'create' => 'participant.project.create',
        'store' => 'participant.project.store',
        'edit' => 'participant.project.edit',
        'update' => 'participant.project.update',
        'destroy' => 'participant.project.destroy',
    ]]);

    Route::resource('verify', 'VerifyController', ['names' => [
        'index' => 'participant.verify.index',
        'create' => 'participant.verify.create',
        'store' => 'participant.verify.store',
        'edit' => 'participant.verify.edit',
        'update' => 'participant.verify.update',
        'destroy' => 'participant.verify.destroy',
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

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectController@index')->name('project.index');
    Route::get('/{id}', 'ProjectController@show')->name('project.show');
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
Route::get('articles', 'HomeController@getArticles')->name('article.list');
Route::get('quote/step/{step}', 'HomeController@getRequestQuote')->name('request-quote');
Route::get('{slug}', 'HomeController@getItem')->name('article.detail');
