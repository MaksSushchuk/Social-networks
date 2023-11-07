<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    protected $table = "friend_requests";

    protected $fillable = ['id','user_id_send','user_id_accepts','user_id_send_agrees','user_id_accepts_agrees'];

    protected $casts = [
        'id' => 'integer',
        'user_id_send' => 'integer',
        'user_id_accepts' => 'integer',
        'user_id_send_agrees' => 'integer',
        'user_id_accepts_agrees' => 'integer',

    ];
}
