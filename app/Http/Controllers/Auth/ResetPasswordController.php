<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use App\Actions\ForgotPasswordAction;

class ResetPasswordController extends Controller
{
    public function create(Request $request){
        return view('auth.reset-password',['request' => $request]);
    }

    public function update(ResetPasswordRequest $request, ForgotPasswordAction $action){

        $request->validated();

        $status =  $action->handle($request);
       
        if($status === Password::PASSWORD_RESET){

            return redirect()->route('login.index')->with('status',trans($status));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => trans($status)]);

    }
}
