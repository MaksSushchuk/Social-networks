<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserSearchController extends Controller
{
    
    public function index(){
        $users = User::paginate(15);

        return view('user.search',compact('users'));
    }

    
}
