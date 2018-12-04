<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function show(User $user)
    {
        $topics = $user->topics;
        $replies = $user->replies()->with('topic')->get();
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
