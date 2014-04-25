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

Route::get('/', function()
{
	$data['firstname'] = 'Demo';	
	return View::make('lifegraphic.health', $data);
});

Route::get('/love', function()
{
	$data['firstname'] = 'Demo';	
	return View::make('lifegraphic.love', $data);
});

Route::get('/assets', function()
{
	$data['firstname'] = 'Demo';	
	return View::make('lifegraphic.assets', $data);
});

Route::get('/mood', function()
{
	$data['firstname'] = 'Demo';	
	return View::make('lifegraphic.mood', $data);
});

Route::post('dashboard', 'UsersController@postLogin');

Route::controller('users', 'UsersController');