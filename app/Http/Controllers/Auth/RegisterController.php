<?php

namespace App\Http\Controllers\Auth;

use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;

class RegisterController extends Controller
{

    public function create(){

        return view('auth.registration');
    }

    public function store(AuthRequest $request, RegisterAction $action){
        
        $request->validated();
        $action->handle($request);

        return redirect('user/home');
    }
}
