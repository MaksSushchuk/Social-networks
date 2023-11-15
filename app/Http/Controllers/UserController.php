<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home(){

        $user = Auth::user();
        $posts = $user->posts->sortByDesc('created_at');
        $avatarPath = $user->avatar !== '' ? $user->avatar : 'avatar/default/219983.png';
        return view('user.home',compact('user','posts','avatarPath'));
    }

    public function notification(){


        $notes =  DB::table('friend_requests')
        ->select('us.username', 'friend_requests.user_id_send AS user_send_id')
        ->join('users AS us','friend_requests.user_id_send', '=','us.id')
        ->where([
            'user_id_accepts' => Auth::id(),
        ])
        ->get();

        return view('user.notification',compact('notes'));

    }


}
