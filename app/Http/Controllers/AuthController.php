<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function signup(Request $request)
	{
		$this->validate($request,[
			"username" => 'required|unique:users',
			"email" => 'required|unique:users',
			"password" => 'required'
		]);

		User::create([
			"username" => $request->json('username'),
			"email" => $request->json('email'),
			"password" => bcrypt($request->json('password')),
		]);
	}
}
