<?php


Route::get('/', function () {
	return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['prefix' => 'panel', 'middleware' => 'can:show panel'], function () {
	Route::get('users', 'UserController@index')->name('users.index');
	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
	Route::post('users/{user}/edit', 'UserController@update')->name('users.update');
	Route::get('roles', 'RoleController@index')->name('roles.index');
	Route::post('roles', 'RoleController@store')->name('roles.store');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
	Route::post('roles/{role}/edit', 'RoleController@update')->name('roles.update');
});
