<?php

namespace App\Http\Controllers;

use App\Actions\UserRatingAction;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\UserReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return response()->json(['message' => 'Comment added successfully']);
    }


    public function friendRequest(int $user_id_accepts){

        FriendRequest::firstOrcreate([
            'user_id_send' => Auth::id(),
            'user_id_accepts' => $user_id_accepts,
        ]);
        
        return back();

    } 

    public function friendAccept(int $user_id_send){

            Friend::firstOrcreate([
                'user_id_send' => $user_id_send,
                'user_id_accepts' => Auth::id(),
            ]);

            FriendRequest::where([
                'user_id_send' => $user_id_send,
                'user_id_accepts' => Auth::id(),
            ])->delete();
    
        return back();
    }

}