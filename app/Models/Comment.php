<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'body','tutorial_id'
    ];

    public function user()
    {
    	$this->belongsTo(User::class);
    }

    public function tutorial()
    {
    	$this->belongsTo(Tutorial::class);
    }
}
