<?php

Route::group(["middleware" => ["api"]], function() {

	Route::post('/auth/signup', "AuthController@signup");
	Route::post('/auth/signin', "AuthController@signin");

	Route::group(['middleware' => ['jwt.auth']], function() {

	    Route::get('/profile', "UserController@show");
	    Route::get('/tutorial', "TutorialController@index");
	    Route::get('/tutorial/show/{id}', "TutorialController@show");
	    Route::post('/tutorial', "TutorialController@store");

	    Route::put('/tutorial/update/{id}',"TutorialController@update");
	    Route::delete('/tutorial/delete/{id}',"TutorialController@delete");
	});

});