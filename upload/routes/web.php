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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('file/create', 'FileController@create')->name('file.create');
Route::post('file', 'FileController@new')->name('file.new');
Route::get('files', 'FileController@index')->name('files');
Route::get('file/{file}', 'FileController@show')->name('file.show');
Route::get('file/delete/{file}' , 'FileController@delete')->name('file.delete');
