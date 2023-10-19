<?php

namespace App\Action;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordAction{

    public function handle($request){
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
