<?php

Route::get('/test', function () {
	  $not = DB::table('notifs')
                        ->select('users.email')
                        ->join('users','users.id','=','notifs.user_id')
                        ->where('users.id','1')
                        ->limit(1)
                        ->orderBy('notifs.title','desc')
                        ->get();
                return $not;
});
Route::get('/ideas', function () {
    return view('ideas');
});
Route::get('/t', function () {
    return view('tasks.t');
});
Route::get('/taskme', 'taskController@t_assign')->name('t_assign');

// chart
// Route::get('diagram', 'TaskController@gogo')->name('task.gogo');

Route::get('/csv1', function () {
	$users = \App\User::get(); // All users
	$csvExporter = new \Laracsv\Export();
	$csvExporter->build($users, ['email', 'name']) // si alte chestii
				->download();
});


		Route::resource('remembers', 'RememberController');
		Route::resource('todoLists', 'todolistController');
		Route::resource('notifs', 'notifController');
		Route::resource('watchers', 'watcherController');
		Route::resource('seens', 'seenController');

		Route::resource('periodcos', 'periodcoController');
		Route::resource('employees', 'EmployeeController');
		Route::resource('repositories', 'repositoryController');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// user
Route::group(['middleware' => ['auth']] , function(){

		Route::get('access_denied', function(){
				$text = 'Nu sunteti autorizat sa accesati acest meniu.';
				return $text;   })-> name('user');
		Route::get('/csv', function () {
		    return  Excel::download(new App\Exports\TasksExport, 'tasks.xlsx'); // all tasks.
		});
		Route::get('/', 'homeController@index')->name('home');
		Route::get('/app', 'homeController@app')->name('app');
		Route::get('profile', 'EmployeeController@profile')->name('profile');
		Route::resource('tasks', 'taskController');
		Route::get ('/search', 'taskController@search');
		Route::post('/tasks/{task}/comments','commentController@store')->name('comm');
		Route::resource('comments', 'commentController');
		Route::get('/departament/{dep}','taskController@departament')->name('departament');
	// admin 
	Route::group(['middleware' => ['isAdmin']] , function(){
		Route::resource('jobs', 'JobController');
		Route::resource('tipconcedius', 'tipconcediuController');
		Route::resource('departaments', 'departamentController');
		Route::resource('zilecos', 'zilecoController');
		Route::resource('statuses', 'statusController');
		Route::resource('priorities', 'priorityController');
		Route::get('/admin', function(){
    			$repositories['repositories'] = App\Models\repository::all();  
				$users['users'] = \App\User::all();
				return view('adminhome',$users, $repositories);
		});
	});
});









// Auth::routes();
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');