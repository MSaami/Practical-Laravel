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
})->name('home');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('register', 'RegisterController@showRegistrationForm')->name('auth.register.form');
    Route::post('register', 'RegisterController@register')->name('auth.register');
    Route::get('login', 'LoginController@showLoginForm')->name('auth.login.form');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::get('logout', 'LoginController@logout')->name('auth.logout');
    Route::get('email/send-verification', 'VerificationController@send')->name('auth.email.send.verification');
    Route::get('email/verify', 'VerificationController@verify')->name('auth.email.verify');
    Route::get('password/forget', 'ForgotPasswordController@showForgetForm')->name('auth.password.forget.form');
    Route::post('password/forget', 'ForgotPasswordController@sendResetLink')->name('auth.password.forget');
    Route::get('password/reset', 'ResetPasswordController@showResetForm')->name('auth.password.reset.form');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('auth.password.reset');
    Route::get('redirect/{provider}', 'SocialController@redirectToProvider')->name('auth.login.provider.redirect');
    Route::get('{provider}/callback', 'SocialController@providerCallback')->name('auth.login.provider.callback');
    Route::get('magic/login', 'MagicController@showMagicForm')->name('auth.magic.login.form');
    Route::post('magic/login', 'MagicController@sendToken')->name('auth.magic.send.token');
    Route::get('magic/login/{token}', 'MagicController@login')->name('auth.magic.login');
    Route::get('two-factor/toggle', 'TwoFactorController@showToggleForm')->name('auth.two.factor.toggle.form');
    Route::get('two-factor/activate', 'TwoFactorController@activate')->name('auth.two.factor.activate');
    Route::get('two-factor/code', 'TwoFactorController@showEnterCodeForm')->name('auth.two.factor.code.form');
    Route::post('two-factor/code', 'TwoFactorController@confirmCode')->name('auth.two.factor.code');
    Route::get('two-factor/deactivate', 'TwoFactorController@deactivate')->name('auth.two.factor.deactivate');
    Route::get('login/code', 'LoginController@showCodeForm')->name('auth.login.code.form');
    Route::post('login/code', 'LoginController@confirmCode')->name('auth.login.code');
    Route::get('two-factor/resent', 'TwoFactorController@resent')->name('auth.two.factor.resent');
});
