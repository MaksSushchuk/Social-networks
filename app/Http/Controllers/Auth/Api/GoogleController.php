<?php

namespace App\Http\Controllers\Auth\Api;

use App\Actions\Api\GoogleRegisterAction;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(GoogleRegisterAction $action)
    {

        // try{

            $googleUser = Socialite::driver('google')->user();
            dd($googleUser);
            $action->handler($googleUser);
            return redirect()->route('user.home');
        // }
        // catch(\Exception $e){
            dump('Authorization via google failed');
        // }

    }

}
