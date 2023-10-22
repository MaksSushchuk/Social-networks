<?php

namespace App\Http\Controllers\Auth;

use App\Action\RegisterAction;
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

    public function store(AuthRequest $request, RegisterAction $action){
        

        $request->validated();

        $action->handle($request);

        return redirect('user/home');
    }
}
