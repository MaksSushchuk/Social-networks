<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\PeopleFilterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserSearchController extends Controller
{
    
    public function index(PeopleFilterRequest $request){
        $data = $request->validated();
        $filter = app()->make(UserFilter::class,['queryParams' => array_filter($data)]);
        $users = User::filter($filter)->where('id', '!=', Auth::id())->paginate(15);

        return view('user.search',compact('users'));
    }

    
}
