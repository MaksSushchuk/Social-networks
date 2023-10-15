<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = false;


    protected $casts = [
        'title' => 'string',
        'text' => 'string',
        'admission' => 'string',
        'user_id' => 'integer',
    ];


}
