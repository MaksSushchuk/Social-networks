<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){

        $user = Auth::user();
        $posts = $user->posts;
        $avatarPath = $user->avatar !== '' ? $user->avatar : 'avatar/default/219983.png';
        return view('user.home',compact('user','posts','avatarPath'));
    }


}
