<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post as VoyagerPost;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends VoyagerPost
{
    use HasFactory;

    protected $fillable = ['id','title','text','status','image','user_id','seo_title','category_id','except'];

    const PUBLISHED = 'PUBLISHED';
    const PRIVATE = 'PRIVATE';

    protected $casts = [
        'title' => 'string',
        'category_id' => 'integer',
        'seo_title' => 'stirng',
        'text' => 'string',
        'status' => 'string',
        'except' => 'string',
        'image' => 'string',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }


}
