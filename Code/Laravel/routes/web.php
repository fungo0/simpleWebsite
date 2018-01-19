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

/********************************************************/
/*Universal Page*/

Route::view('/', 'home');

Route::any('/courselist', 'SearchController@coursesearch');
Route::any('/message', 'MessageController@message');
Route::any('/search', 'SearchController@filter');
Route::get('/result', 'SearchController@postsearch');
Route::get('/error', 'ErrorController@errorRecord');
Route::get('/material', 'CourseController@materials');

Auth::routes();

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');
Route::resource('courses', 'CourseController');
Route::resource('events', 'EventController');

/******************************************************************/
/*Admin Page*/

Route::get('/adminlogin', function()
{
	return View::make('admins.login2');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function() {

	Route::get('/reply', 'ReplyController@display');
	Route::get('/admin', 'AdminController@userCount');
	Route::get('/blacklists', 'BlacklistController@blacklist');
	Route::get('/notifications', 'NotificationController@unreadNotification');
	Route::get('/read', 'NotificationController@readNotification');
	Route::get('/newuser', 'UserController@display');
	Route::get('/usersearch', 'SearchController@usersearch');

	Route::get('/logout2', function() 
	{
		Request::session()->flush();
		Auth::logout();
		return redirect('/adminlogin');
	});

	Route::get('/charts', function()
	{
		return View::make('admins.mcharts');
	});

	Route::get('/tables', function()
	{
		return View::make('admins.table');
	});

	Route::get('/forms', function()
	{
		return View::make('admins.form');
	});

	Route::get('/grid', function()
	{
		return View::make('admins.grid');
	});

	Route::get('/buttons', function()
	{
		return View::make('admins.buttons');
	});


	Route::get('/icons', function()
	{
		return View::make('admins.icons');
	});

	Route::get('/panels', function()
	{
		return View::make('admins.panel');
	});

	Route::get('/typography', function()
	{
		return View::make('admins.typography');
	});

	Route::get('/alert', function()
	{
		return View::make('admins.alerts');
	});

	Route::get('/blank', function()
	{
		return View::make('admins.blank');
	});

	Route::get('/documentation', function()
	{
		return View::make('admins.documentation');
	});
});

/**************************************/
/*User Page*/

Route::get('/logout', function() {
	Request::session()->flush();
	Auth::logout();
	return redirect('/');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('/profile', 'ProfileController@profile');
	Route::get('/editprofile', 'ProfileController@edit');
	Route::get('/change', 'CourseController@unreadNotification');
	Route::get('/known', 'CourseController@readNotification');
	Route::get('/courseregister/{id}', 'AdmissionController@register');
	Route::get('/courseunregister/{id}', 'AdmissionController@unregister');
	Route::get('/mycourse', 'AdmissionController@display');
	Route::get('/payment', 'PaymentController@showPayment');
	Route::post('/payment', 'PaymentController@testPayment');
	Route::any('/uploadmaterial', 'CourseController@uploadmaterial');
	Route::any('/pay', 'PaymentController@pay');
	Route::any('/comment/{id}', 'EventController@comment');
	Route::any('/editicon', 'ProfileController@changeicon');
	Route::any('/updateprofile', 'ProfileController@update');

	Route::view('/materialinfo', 'materialinfo');

	Route::get('/download/{filename}', function($filename)
	{
		$filepath = public_path().'/coursematerial/'.$filename;

		if (file_exists($filepath))
			return Response::download($filepath, $filename, ['Content-Length: '.filesize($filepath)]);
		else
			return view('errors.wrong')->with('error', 'Something wrong happened.................');
	});
});

Route::view('/about', 'about');
Route::view('/admission', 'admission');
Route::view('/faculty', 'faculty');
Route::view('/services', 'services');
Route::view('/features', 'features');
Route::view('/career', 'career');
Route::view('/contacts', 'contacts');

Route::view('/students', 'students');

/***************************************/