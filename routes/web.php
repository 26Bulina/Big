<?php

Route::get('/app', function () {
    return view('layouts/app');
});
Route::get('/ideas', function () {
    return view('ideas');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');






// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



Route::group(['middleware' => ['auth']] , function(){
	Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/home',function(){
			return view('home');
	})->name('user'); // controller 


	// admin 

	Route::group(['middleware' => ['isAdmin']] , function(){
		// Registration Routes...
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('/admin', function(){
				$users['users'] = \App\User::all();
				return view('adminhome',$users);
		});
	});

});





Route::resource('items', 'ItemController');

Route::resource('notifications', 'NotificationController');

Route::resource('empls', 'emplController');

Route::resource('remembers', 'RememberController');

Route::resource('todoLists', 'todolistController');

Route::resource('periodcos', 'periodcoController');

Route::resource('notifs', 'notifController');

Route::resource('statuses', 'statusController');

Route::resource('priorities', 'priorityController');

Route::resource('repositories', 'repositoryController');

Route::resource('departaments', 'departamentController');

Route::resource('tasks', 'taskController');

Route::resource('watchers', 'watcherController');

Route::resource('seens', 'seenController');

Route::resource('comments', 'commentController');

Route::resource('departamentHas', 'departamenthasController');