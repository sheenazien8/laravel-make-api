<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
	public function index()
	{
		return Tutorial::with('comments')->get();
		/*return Tutorial::all();*/
	}

	public function show($id)
	{
		$tutorial = Tutorial::with('comments')->where('id', $id)->first();
		/*Menguji ownership apakah tutorial itu punya si id yang login*/
		if (!$tutorial) {
			return response()->json([
				"error" => "id tutorial tidak ditemukan"
			]);
		}

		return $tutorial;
	}

	public function store(Request $request)
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

	public function update(Request $request,$id)
	{
		$this->validate($request,[
			"title" => 'required',
			"body" => 'required',
		]);

		$tutorial = Tutorial::find($id);
		/*Menguji ownership apakah tutorial itu punya si id yang login*/
		if ($request->user()->id != $tutorial->user_id) {
			return response()->json([
				"error" => "tidak boleh mengedit halaman ini"
			]);
		}

		$tutorial->title = $request->title;
		$tutorial->slug = str_slug($request->title);
		$tutorial->body = $request->body;
		$tutorial->save();

		return $tutorial;
	}

	public function delete(Request $request,$id)
	{
		$tutorial = Tutorial::find($id);
		if ($request->user()->id != $tutorial->user_id) {
			return response()->json([
				"error" => "tidak boleh menghapus halaman ini"
			]);
		}
		$tutorial->delete();
		return "success";
	}
}
