<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tutorial extends Model
{
	protected $fillable = ["title","slug","body"];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
