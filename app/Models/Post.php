<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post as VoyagerPost;
use App\Models\Comment;

class Post extends VoyagerPost
{
    use HasFactory;

    protected $guarded = false;

    const PUBLISHED = 'PUBLISHED';
    const PRIVATE = 'PRIVATE';

    protected $casts = [
        'title' => 'string',
        'text' => 'string',
        'status' => 'string',
        'user_id' => 'integer',
    ];


    public function comments(){
        return $this->hasMany(Comment::class);
    }


}
