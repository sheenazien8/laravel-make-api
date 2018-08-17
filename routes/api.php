<?php

Route::group(["middleware" => ["api"]], function() {

  Route::post('/auth/signup', "AuthController@signup");
  Route::post('/auth/signin', "AuthController@signin");

});