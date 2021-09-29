<?php

Route::group(['prefix' => 'v1'], function(){
    Route::group([ 'prefix' => 'auth' ], function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
    Route::resource('articles', 'ArticleController');

});
