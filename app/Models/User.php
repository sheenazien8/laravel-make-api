<?php

namespace App\Models;

use App\Models\Tutorial;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
