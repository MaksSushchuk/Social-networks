<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function create(Request $request){
        return view('auth.reset-password',['request' => $request]);
    }

    public function update(ResetPasswordRequest $request){

        $request->validated();


        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user) use($request){
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    // 'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if($status === Password::PASSWORD_RESET){

            return redirect()->route('login.index')->with('status',trans($status));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => trans($status)]);

    }
}
