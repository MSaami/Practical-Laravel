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

use App\Product;
use App\Support\Storage\Contracts\StorageInterface;

Route::get('/', function () {


    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('products', 'ProductsController@index')->name('products.index');
Route::get('basket/add/{product}', 'BasketController@add')->name('basket.add');
Route::get('basket', 'BasketController@index')->name('basket.index');
Route::post('basket/update/{product}', 'BasketController@update')->name('basket.update');
Route::get('basket/checkout', 'BasketController@checkoutForm')->name('basket.checkout.form');
Route::post('basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::post('payment/{gateway}/callback', 'PaymentController@verify')->name('payment.verify');
Route::post('coupon' , 'CouponsController@store')->name('coupons.store');
Route::get('coupon/remove' , 'CouponsController@remove')->name('coupons.remove');
Route::get('orders', 'OrdersController@index')->name('orders');
Route::get('invoice/{order}' , 'InvoicesController@show')->name('invoice.show');
Route::get('orders/pay/{order}', 'OrdersController@pay')->name('order.pay');

Route::get('basket/clear', function () {
    resolve(StorageInterface::class)->clear();
});
