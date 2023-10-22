<?php

namespace App\Http\Controllers;

use App\Action\UserRatingAction;
use App\Models\UserReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserActionController extends Controller
{

    public function like(int $post_id, UserRatingAction $action){

        $action->handle(UserReaction::LIKE, $post_id);
        return back();

    }

    public function dislike(int $post_id, UserRatingAction $action){

  
        $action->handle(UserReaction::DISLIKE, $post_id);
        return back();
    }


    public function commment(){
        
    }

}