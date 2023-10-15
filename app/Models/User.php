<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'avatar' => 'string',
        'password' => 'string',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }


}
