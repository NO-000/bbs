<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }

    public function show(User $user)
    {
        $topics = $user->topics()->orderBy('id','desc')->paginate(15);
        $replies = $user->replies()->with('topic')->orderBy('id','desc')->paginate(7);
        return view('users.show',compact('user','topics','replies'));
    }


    public function edit(User $user)
    {
        return view('users.edit.edit',compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->back()->with('success','修改个人资料成功！');

    }


    public function destroy(User $user)
    {
        //
    }
}
