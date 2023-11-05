<?php

namespace App\Actions;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ForgotPasswordAction{

    public function handle(Request $request) {
            $status = Password::reset(
                $request->only('email','password','password_confirmation','token'),
                function($user) use($request){
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        // 'remember_token' => Str::random(60),
                    ])->save();
                }

            );
        return $status;
    }
}
