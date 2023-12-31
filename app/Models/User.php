<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use App\Models\Traits\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TCG\Voyager\Traits\VoyagerUser;
use TCG\Voyager\Contracts\User as VoyagerUserInterface;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail, VoyagerUserInterface
{
    use HasFactory, Notifiable,Filterable, VoyagerUser;


    protected $fillable = [
        'username',
        'email',
        'avatar',
        'password',
        'age',
        'sex',
        'country',
        'birthplace',
        'location',
        'role_id'
    ];

    protected $casts = [
        'username' => 'string',
        'email' => 'string',
        'avatar' => 'string',
        'password' => 'string',
        'age' => 'integer',
        'sex' => 'string',
        'country' => 'string',
        'birthplace' => 'string',
        'location' => 'string',

    ];

    protected $hidden = [
        'password',
    ];

    public function posts(): HasMany{
        return $this->hasMany(Post::class);
    }


    public function isAdmin(): bool {
        return $this->role_id === 1;
    }

    public function friends(): HasMany {
        return $this->hasMany(Friend::class);
    }

}
