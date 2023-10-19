<?php

namespace App\Action;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RegisterAction{

    public function handle($request){
        
        
        $avatar = $request->hasFile('file') ? 
        $request->file('file')->getClientOriginalName() :
         null;
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar,
            'role_id' => 1,
        ]);

        if ($avatar) {
            $path = $request->file('file')->store('avatar','public');
            File::create([
                'user_id' => $user->id,
                'filename' => $avatar,
                'path' => $path,
            ]);
        }

        Auth::login($user);
    }
} 
