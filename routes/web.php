<?php

Route::get('/app', function () {
    return view('layouts/app');
});
Route::get('/ideas', function () {
    return view('ideas');
});
Route::get('/', function () {
    return view('home');
});




Route::get('/t', function () {
    return view('tasks.t');
});
Route::get('/taskme', 'taskController@t_assign')->name('t_assign');








// chart
// Route::get('diagram', 'TaskController@gogo')
// ->name('task.gogo')
 // diagrama task

// csv
Route::get('/csv', function () {
    return  Excel::download(new App\Exports\TasksExport, 'tasks.xlsx'); // all tasks.
});


Route::get('/csv1', function () {
	$users = \App\User::get(); // All users
	$csvExporter = new \Laracsv\Export();
	$csvExporter->build($users, ['email', 'name']) // si alte chestii
				->download();
});








Route::get('/test', function () {

	  $not = DB::table('notifs')
                        ->select('users.email')
                        ->join('users','users.id','=','notifs.pers_create')
                        ->where('users.name','Alina')
                        ->limit(1)
                        ->orderBy('notifs.title','desc')
                        ->get();
                return $not;
    
    	// return view('welcome');
	});



Route::resource('tasks', 'taskController');
Route::get ('/search', 'taskController@search');

Route::resource('comments', 'commentController');
Route::post('/tasks/{task}/comments','commentController@store')->name('comm');


Route::resource('remembers', 'RememberController');
Route::resource('todoLists', 'todolistController');
Route::resource('periodcos', 'periodcoController');
Route::resource('notifs', 'notifController');


Route::resource('employees', 'EmployeeController');
Route::get('profile', 'EmployeeController@profile')->name('profile');

Route::resource('jobs', 'JobController');
Route::resource('tipconcedius', 'tipconcediuController');
Route::resource('departaments', 'departamentController');
Route::resource('zilecos', 'zilecoController');
Route::resource('statuses', 'statusController');
Route::resource('priorities', 'priorityController');
Route::resource('repositories', 'repositoryController');



Route::resource('watchers', 'watcherController');
Route::resource('seens', 'seenController');







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


// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::group(['middleware' => ['auth']] , function(){
	Route::get('/', function () {
				// $u = App\User::get();
				// \Debugar::info($u);
    	return view('home');
	});

	// Route::get('home', 'repositoryController@showmeniu')->name('user');
	Route::get('home',function(){
			return view('home');
	})->name('user'); // controller 



	// admin 
	Route::group(['middleware' => ['isAdmin']] , function(){
		Route::get('/admin', function(){
    			$repositories['repositories'] = App\Models\repository::all();  
				$users['users'] = \App\User::all();
				return view('adminhome',$users, $repositories);
		});
	});

});

