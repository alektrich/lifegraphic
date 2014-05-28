<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	if(Auth::check()) {
		return Redirect::to('health');
	} else {
		return View::make('users.login');
	}
});

Route::get('aboutUs', function() {
	return View::make('about');
});

Route::controller('users', 'UsersController');

Route::get('/logout', 'UsersController@getLogout');

Route::get('/love', 'UsersController@getLove');

Route::get('/assets', 'UsersController@getAssets');

Route::get('/mood', 'UsersController@getMood');

Route::get('/health', 'UsersController@getHealth');

