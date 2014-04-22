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
	return View::make('users.login');
});

Route::get('/main', function()
{
	$data['firstname'] = 'Demo';	
	return View::make('lifegraphic', $data);
});

Route::post('dashboard', 'UsersController@postLogin');

Route::controller('users', 'UsersController');