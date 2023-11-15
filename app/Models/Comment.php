<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TCG\Voyager\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'text'];

    protected $casts =[
        'user_id' => 'integer',
        'post_id' => 'integer',
        'text' => 'string',
    ];

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }
}
