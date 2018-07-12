<?php

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/profile-password', 'ProfileController@password')->name('profile.password');
Route::put('/profile-password', 'ProfileController@updatePassword')->name('profile.updatePassword');

Route::get('/companies/invite', 'CompanyController@invite')->name('company.invite');
Route::put('/companies/invite-process', 'CompanyController@inviteProcess')->name('company.inviteProcess');
Route::resource('companies', 'CompanyController', ['names' => [
    'index' => 'company.index',
    'create' => 'company.create',
    'store' => 'company.store',
    'edit' => 'company.edit',
    'update' => 'company.update',
    'destroy' => 'company.destroy',
]]);

Route::resource('projects', 'ProjectController', ['names' => [
    'index' => 'project.index',
    'create' => 'project.create',
    'store' => 'project.store',
    'edit' => 'project.edit',
    'update' => 'project.update',
    'destroy' => 'project.destroy',
]]);

Route::resource('verify', 'VerifyController', ['names' => [
    'index' => 'verify.index',
    'create' => 'verify.create',
    'store' => 'verify.store',
    'edit' => 'verify.edit',
    'update' => 'verify.update',
    'destroy' => 'verify.destroy',
]]);

Route::get('quotes', 'QuoteController@index')->name('quote.index');

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