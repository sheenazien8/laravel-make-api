<?php

Route::group(["middleware" => ["api"]], function() {

	Route::post('/auth/signup', "AuthController@signup");
	Route::post('/auth/signin', "AuthController@signin");
	Route::get('/tutorial', "TutorialController@index");
	Route::get('/tutorial/show/{id}', "TutorialController@show");

	Route::group(['middleware' => ['jwt.auth']], function() {

	    Route::get('/profile', "UserController@show");
	    /*tutorial*/
	    Route::post('/tutorial', "TutorialController@store");
	    Route::put('/tutorial/update/{id}',"TutorialController@update");
	    Route::delete('/tutorial/delete/{id}',"TutorialController@delete");

	    /*komentar tutorial*/
	    Route::post('/comment/{tut_id}', "CommentController@store");
	});

});