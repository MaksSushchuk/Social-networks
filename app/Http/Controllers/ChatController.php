<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function chat(int $user_accept){
        if(Auth::id() == $user_accept){
            return dd('You cannot write to yourself');
        }
        $myId = Auth::id();
        $data = DB::table('users')
        ->select('users.id', 'users.username', 'messages.message AS message_text','messages.updated_at AS time')
        ->join('messages', 'users.id', '=', 'messages.user_send')
        ->where(['messages.user_accept' => $user_accept, 'messages.user_send' => Auth::id()])
        ->orWhere(['messages.user_accept' => Auth::id(), 'messages.user_send' => $user_accept])
        ->get();
        
        return view('user.chat', compact('data', 'myId', 'user_accept'));
    }

    public function message(MessageRequest $request, int $user_accept){

        $request->validated();
        $message = Message::create([
            'user_send' => Auth::id(),
            'user_accept' => $user_accept,
            'message' => $request->text,
        ]);

        broadcast(new StoreMessageEvent($message, User::find($user_accept)));
        return back();
    }
}
