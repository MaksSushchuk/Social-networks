<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerifyController extends Controller
{


    public function __invoke(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('user.home');
    
    }
}
