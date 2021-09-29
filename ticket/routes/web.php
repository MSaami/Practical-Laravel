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

Route::group(['prefix' => 'admin'], function(){
    Route::get('register', 'AdminController@showRegistrationForm')->name('admin.register.form');
    Route::post('register', 'AdminController@register')->name('admin.register');
    Route::get('login', 'AdminController@showLoginForm')->name('admin.login.form');
    Route::post('login', 'AdminController@login')->name('admin.login');

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tickets/new', 'TicketController@new')->name('ticket.new');
Route::post('tickets', 'TicketController@create')->name('ticket.create');
Route::get('tickets', 'TicketController@index')->name('ticket.index');
Route::get('tickets/{ticket}', 'TicketController@show')->name('ticket.show');
Route::post('tickets/{ticket}/reply', 'ReplyController@create')->name('reply.create');
Route::get('tickets/{ticket}/close', 'TicketController@close')->name('ticket.close');


