<?php

namespace App\Actions;

use App\Models\Post;
use App\Models\UserReaction;
use Illuminate\Support\Facades\Auth;


class UserRatingAction {

    public function handle(string $reaction,int $post_id){
        $user_id = Auth::id();

       // like/dislike user
        $existingRating = UserReaction::where([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'type' => $reaction,
        ])->first();

        if ($existingRating) {
            $existingRating->delete();
        } else {
            UserReaction::updateOrCreate(
                ['user_id' => $user_id, 'post_id' => $post_id],
                ['type' => $reaction]
            );

        }

    
    }
}