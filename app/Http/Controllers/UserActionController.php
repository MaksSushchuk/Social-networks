<?php

namespace App\Http\Controllers;

use App\Action\UserRatingAction;
use App\Models\Comment;
use App\Models\UserReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class UserActionController extends Controller
{

    public function like(int $post_id, UserRatingAction $action){
    
        $action->handle(UserReaction::LIKE, $post_id);
        return response()->json(['message' => 'Like is successfully added']);
    }
    
    public function dislike(int $post_id, UserRatingAction $action){
    
        $action->handle(UserReaction::DISLIKE, $post_id);
        return response()->json(['message' => 'Dislike successfully added']);
    }
    


    public function comment(Request $request, int $post_id){

        $request->validate([
            'text' => ['required','string','max:255'],
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post_id,
            'text' => $request->text,
        ]);

        return response()->json(['message' => 'Dislike successfully added']);
    }

}