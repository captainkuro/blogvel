<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// List of posts
Route::get('/', function()
{
	// @TODO
	return View::make('post.list');
});

// Detail of one post, also give comment
Route::get('post/(:num)', function($id)
{
	// @TODO
	return View::make('post.detail');
});

// Process of adding a comment
Route::post('post/(:num)', function($id)
{
	// @TODO
	return Redirect::to('post/'.$id);
});

// Login
Route::get('login', function()
{
	if (Auth::check()) 
	{
		return Redirect::to('admin');
	}
	
	$attempt = array(
		'username' => Input::get('username'),
		'password' => Input::get('password'),
	);
	if (Auth::attempt($attempt)) 
	{
		return Redirect::to('admin');
	}
	
	return View::make('home.login');
});

// Logout
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

// Welcome message
Route::get('admin', function()
{
	return View::make('admin.index');
});

// List of posts to administrate
Route::get('admin/post', function() 
{
	// @TODO
	return View::make('admin.posts');
});

// Add/edit one post
Route::get('admin/post/(:num?)', function($id = null)
{
	// @TODO
	return View::make('admin.post');
});

Route::post('admin/post/(:num?)', function($id = null)
{
	// @TODO
	return Redirect::to('admin/post/'.$id);
});

// Approve/unapprove/delete comments
Route::get('admin/comment', function()
{
	// @TODO
	return View::make('admin.comments');
});

// Common filter
Route::filter('pattern: admin/*', 'auth');

Route::controller(Controller::detect());

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});