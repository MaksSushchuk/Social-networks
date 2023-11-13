<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_send','user_accept','message'];

    protected $casts = [
        'id' => 'integer',
        'user_send' => 'integer',
        'user_accept' => 'integer',
        'message' => 'string',

    ];
}
