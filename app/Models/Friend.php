<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id_send','user_id_accepts'];

    protected $casts = [
        'id' => 'int',
        'user_id_send' => 'int',
        'user_id_accepts' => 'int',

    ];
}
