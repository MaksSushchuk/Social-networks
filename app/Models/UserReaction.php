<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReaction extends Model
{
    use HasFactory;

    protected $fillable = ['type','user_id','post_id'];

    const LIKE = 'like';
    const DISLIKE = 'dislike';

    
    public static function existRaiting(int $user_id,int $post_id, string $type) : bool {

        return self::where(['user_id' => $user_id, 'post_id' => $post_id, 'type' => $type ])->exists() ? true : false;
    }
}
