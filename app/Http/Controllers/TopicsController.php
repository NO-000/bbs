<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TopicsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function create()
    {
        //
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('topics.show',$topic->id)->with('success', '发帖成功');
    }


    public function show(Topic $topic)
    {
        $user = $topic->user;
        $replies = $topic->replies()->with('user')->orderBy('id','desc')->get();
        return view('topics.show',compact('topic','user','replies'));
    }


    public function edit(Topic $topic)
    {
        //
    }


    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('ownTopic', $topic);

        $topic->update($request->all());

        return redirect()->back()->with('success', '成功');
    }


    public function destroy(Topic $topic)
    {
        $this->authorize('ownTopic', $topic);

        $topic->delete();

        return redirect()->route('home')->with('success', '成功');
    }

    public function uploadImage(TopicRequest $request, ImageUploadHandler $uploader)
    {
       // 初始化返回数据，默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => ''
        ];

        if($request->upload_file){
            $path = $uploader->getImageStorePath($request->upload_file,'Topics');


                $data['success']   = true;
                $data['msg']       = "上传成功!";
                $data['file_path'] = asset(Storage::url($path));

            }
            return $data;

    }
}
