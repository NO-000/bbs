<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(User $user)
    {
        $topics = $user->topics()->orderBy('id', 'desc')->paginate(19);

        $replies = $user->replies()->with('topic')->orderBy('id', 'desc')->paginate(8);

        return view('users.show', compact('user', 'topics', 'replies'));
    }


    public function edit(User $user)
    {

        $this->authorize('own',$user);

        return view('users.edit.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user, ImageUploadHandler $image)
    {

        $this->authorize('own',$user);

        $data = $request->all();

        if ($request->avatar) {
            $data['avatar'] = $image->getImageStorePath($request->avatar, 'avatars');
        }

        $user->update($data);

        return redirect()->back()->with('success', '修改个人资料成功！');

    }


    public function destroy(User $user)
    {
        //
    }
}
