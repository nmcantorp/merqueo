<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('auth/register', 'AuthController@getRegiter');
Route::post('auth/register', 'AuthController@postRegister');

Route::controller('uploads','UploadsController');
Route::get('files','FileController@getIndex');

Route::get('files/detail/{id}', ['as' => 'file_details', 'uses'=>'FileController@getDetails'] );