@extends('layouts.users.default')

@section('title',$user->name.'的个人中心')

@section('left')
<div class=" card">
    <div class="py-3 px-3">

        <div class="m-auto justify-content-center text-center">
            <img class="img-thumbnail center-block" src="{{$user->avatar}}" alt="" width="200" height="200">

            <div class="mt-2 px-1">
                <button type="button" class="btn btn-info px-3">关注Ta</button>
                <button type="button" class="btn btn-info px-3">私信Ta</button>
            </div>
        </div>
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
        <a class="nav-link {{active_class(!if_query('tab','replies'))}} border" href="{{ route('users.show', $user->id) }}">Ta的话题</a>
    </li>
    <li class="nav-item">
        <a class="nav-link border {{active_class(if_query('tab','replies'))}}" href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">Ta的回复</a>
    </li>
</ul>
<div class="card">


    @if (!if_query('tab','replies'))

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
        <div class="mt-3 ml-3"> {{ $topics->links() }}</div>

    @else

        <ul class="list-group">

            @foreach ($replies as $reply)
            <li class="list-group-item border-left-0 border-right-0">
                <div class="hidden-text "><a class="" href="#" title="{{$reply->content}}">{{$reply->content}}</a></div>
                <div class="hidden-text ">
                    <p>{{$reply->topic->title}}</p>
                </div>
                <small data-toggle="tooltip" title="{{$reply->updated_at}}">回复于{{$reply->updated_at->diffForHumans()}}</small>
            </li>
            @endforeach

        </ul>
        <div class="mt-3 ml-3"> {{  $replies->appends(['tab' => 'replies'])->links()}}</div>

    @endif

</div>
</div>
</div>
@endsection
