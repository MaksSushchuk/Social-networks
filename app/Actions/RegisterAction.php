<?php

namespace App\Actions;

use App\Events\UserCreated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use App\Jobs\DefaultAvatarImportJob;

class RegisterAction{

    public function handle($request){

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'avatar' => '',
            'role_id' => 1,
        ]);
        event(new UserCreated($user));

        Auth::login($user);
    }
} 
