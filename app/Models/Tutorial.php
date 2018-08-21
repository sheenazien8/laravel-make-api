<?php

namespace App\Models;

use App\Models\User;
use App\Models\Models;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
	protected $fillable = ["title","slug","body"];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
