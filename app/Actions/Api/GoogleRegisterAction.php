<?php

namespace App\Actions\Api;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\UserCreated;
use App\Models\User;


class GoogleRegisterAction{

    public function handler($googleUser){

        $user = User::updateOrCreate(['email' => $googleUser->email],
        [
            'username' => $googleUser->name,
            'email' => $googleUser->email,
            'role_id' => 1,
        ]);
        DB::table('auth_api')->updateOrInsert([
            'user_id' => $user->id,
            'google_id' => $googleUser->id,
        ]);
        Auth::login($user);
        event(new UserCreated($user), new Registered($user));
    }
}