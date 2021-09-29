<?php
use App\Services\Notification\Notification;
use App\User;
use App\Mail\TopicCreated;

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
    return view('home');
});

Route::get('notis', function () {
    $notification = new Notification;
    $notification->sendEmail(User::find(1), new TopicCreated);
});
Route::get('/notification/send-email', 'NotificationsController@email')->name('notification.form.email');
Route::post('/notification/send-email', 'NotificationsController@sendEmail')->name('notification.send.email');
Route::get('/notification/send-sms', 'NotificationsController@sms')->name('notification.form.sms');
Route::post('/notification/send-sms', 'NotificationsController@sendSms')->name('notification.send.sms');
