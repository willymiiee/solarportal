<?php

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

Route::get('projects', 'ProjectController@index')->name('projects');
Route::get('project/{id}/set-visibility/{visibility}', 'ProjectController@putVisibility')->name('projects.putVisibility');

Route::prefix('verify')->namespace('Verify')->as('verify.')->group(function () {
	Route::resources([
		'packages' => 'PackageController'
	]);
});