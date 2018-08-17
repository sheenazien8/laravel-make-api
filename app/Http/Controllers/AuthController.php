<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;


class AuthController extends Controller
{
	public function signup(Request $request)
	{
		$this->validate($request,[
			"username" => 'required|unique:users',
			"email" => 'required|unique:users',
			"password" => 'required'
		]);

		return User::create([
			"username" => $request->json('username'),
			"email" => $request->json('email'),
			"password" => bcrypt($request->json('password')) ,
		]);
	}

	public function signin(Request $request)
	{
		$credentials = $request->only('username', 'password');
	    if (!$token = JWTAuth::attempt($credentials)) {
	            return response([
	                'status' => 'error',
	                'error' => 'invalid.credentials',
	                'msg' => 'Invalid Credentials.'
	            ], 400);
	    }
	    
    	return response([
            'status' => 'success',
            'user_id' => $request->user()->id,
            'token' => $token
	    ]);
	}
}
