@extends('layouts.users.default')

@section('title',$user->name.'的个人中心')

@section('left')
<div class=" card">
    <div class="py-3 px-3">

        <div class="m-auto justify-content-center text-center">
            <img class="img-thumbnail center-block" src="{{$user->avatar}}" alt="" width="200" height="200">
        </div>
        <button>关注TA</button>
        <button>私信TA</button>
        <hr>

        <h4>名字</h4>
        <p>{{$user->name}}</p>
        <hr>

        <h4>个人简介</h4>
        <p>{{$user->introduction}}</p>
        <hr>

        <h4>邮箱</h4>
        <p>{{$user->email}}</p>
        <hr>

        <h4>身份</h4>
        <a href=""><span class="badge badge-pill badge-primary">普通用户</span></a>
        <hr>

        <h4>注册时间</h4>
        <p data-toggle="tooltip" title="{{$user->created_at}}">{{$user->created_at->diffForHumans()}}</p>
        <hr>

        <h4>最后活跃时间</h4>
        <p data-toggle="tooltip" title="{{$user->updated_at}}">{{$user->updated_at->diffForHumans()}}</p>

    </div>
</div>
@endsection

@section('right')

<ul class="nav nav-pills nav-justified " role="tablist">
    <li class="nav-item">
        <a class="nav-link active border" data-toggle="pill" href="#topics">Ta的话题</a>
    </li>
    <li class="nav-item">
        <a class="nav-link border" data-toggle="pill" href="#replies">Ta的回复</a>
    </li>
</ul>
<div class="card">
    <!-- Tab panes -->
    <div class="tab-content">

        <div id="topics" class="tab-pane active">
            <ul class="list-group">

                @foreach ($topics as $topic)
                <li class="list-group-item border-left-0 border-right-0 text-secondary">
                <div class="hidden-text float-left"><a class="" href="" title="{{$topic->title}}">{{$topic->title}}</a></div>
                    <small class=" float-right ">
                        0回复
                        ·
                        <span data-toggle="tooltip" title="{{$topic->updated_at}}">{{$topic->updated_at->diffForHumans()}}</span>
                    </small>
                </li>
                @endforeach

            </ul>
        </div>


        <div id="replies" class="tab-pane fade ">

            <ul class="list-group">

                @foreach ($replies as $reply)
                <li class="list-group-item border-left-0 border-right-0">
                    <div class="hidden-text "><a class="" href="#" title="{{$reply->content}}">{{$reply->content}}</a></div>
                    <div class="hidden-text "><p>{{$reply->topic->title}}</p></div>
                    <small data-toggle="tooltip" title="{{$reply->updated_at}}">{{$reply->updated_at}}</small>
                </li>
                @endforeach

            </ul>

        </div>

    </div>
</div>
</div>
@endsection
