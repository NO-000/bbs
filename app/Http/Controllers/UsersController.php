<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function show(User $user)
    {
        $topics = $user->topics()->orderBy('id','desc')->paginate(15);
        $replies = $user->replies()->with('topic')->orderBy('id','desc')->paginate(7);
        return view('users.show',compact('user','topics','replies'));
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
