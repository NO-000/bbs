<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyRequest $request, Reply $reply)
    {

        $reply->fill($request->all());
        $reply->user_id = Auth::id();
        $reply->save();

        return redirect()->back()->with('success', '成功');
    }


    public function destroy(Reply $reply)
    {
        $this->authorize('ownReply', $reply);

        $reply->delete();

        return redirect()->back()->with('success', '成功');
    }
}
