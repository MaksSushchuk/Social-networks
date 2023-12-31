<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'display_name',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
    ];

    
}
