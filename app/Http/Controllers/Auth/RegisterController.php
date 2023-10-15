<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{

    public function create(){
        return view('auth.registration');
    }

    public function store(AuthRequest $request){

        $request->validated();


        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $request->file('file')->getClientOriginalName(),
            'role_id' => 1,
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('avatar','public');
            File::create([
                'user_id' => $user->id,
                'filename' => $request->file('file')->getClientOriginalName(),
                'path' => $path,
            ]);
        }

        Auth::login($user);

        return redirect('user/home');
    }
}
