<?php

namespace App\Actions;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterAction{

    public function handle(Request $request){

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'avatar' => '',
            'role_id' => 1,
        ]);

        event(new UserCreated($user));
        event(new Registered($user));

        Auth::login($user);
    }
} 
