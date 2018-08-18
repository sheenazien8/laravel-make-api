<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
	public function create(Request $request)
	{
		$this->validate($request,[
			"title" => 'required',
			"body" => 'required',
		]);
		/*
			User make a many tutorials via user model because relation user has many tutorial
			User membuat banya tutorials lewat model user karena relasinya user mempunyai banyak tutorial dan user harus login dulu sebelum membuat tutorial
		*/
		$tutorial = $request->user()->tutorials()->create([
			"title" => $request->json('title'),
			"slug" => str_slug($request->json('title')),
			"body" => $request->json('body') ,
		]);

		return $tutorial;
	}
}
