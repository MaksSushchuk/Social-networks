<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RegisterAction{

    public function handle($request){
        
        
        $user = User::create([
            'username' => strtolower($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->file('avatar')->getClientOriginalName(),
            'role_id' => 1,
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatar','public');
            File::create([
                'user_id' => $user->id,
                'filename' => $request->file('avatar')->getClientOriginalName(),
                'path' => $path,
            ]);
        }

        Auth::login($user);
    }
} 
