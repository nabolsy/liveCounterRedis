<?php

Route::prefix('users')->group(function() {
	Route::post('register', 'API\RegisterController@register');
	Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');
});

Route::group(['middleware'=> ['jwt']], function() {
	Route::prefix('')->group(function() {
		
	});
});