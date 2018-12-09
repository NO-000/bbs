@extends('layouts.topics.default')

@section('title',$topic->title)

@section('left')
<div class="card">
    <div class="py-3 px-3 text-center">

        <img class="border" src="{{ asset(Storage::url($user->avatar)) }}" alt="" width="200" height="210">

        <hr>

        <p>作者：<a href="{{route('users.show',$user->id)}}">{{$user->name}}</a></p>

    </div>
</div>
@endsection


@section('right')

<div class="card">
    <div class="py-3 px-3">

        <h4>{{$topic->title}}</h4>

        <small class="pt-2">
            <span data-toggle="tooltip" title="{{$topic->created_at}}">创建于{{$topic->created_at->diffForHumans()}}
            </span>/
            <span>回复数:{{$topic->reply_count}}</span>/
            <span>阅读数:{{$topic->view_count}}</span>
        </small>

        <hr>

        <div>
            {!! $topic->content !!}
        </div>

    </div>
</div>

<br>

<div class="">

    <ul class="list-group">
        @foreach ($replies as $reply)
        <li class="list-group-item">

            <div class="float-left pr-2 card border-0"> <img class="border" src="{{ asset(Storage::url($reply->user->avatar)) }}"
                    width="50" height="50"></div>

            <div class="card border-0">
                <small>
                    <a href="{{route('users.show',$reply->user->id)}}">{{$reply->user->name}}</a> · <span data-toggle="tooltip"
                        title="{{$reply->created_at}}">{{$reply->created_at->diffForHumans()}}</span>
                </small>
                <p>{{$reply->content}}</p>
            </div>
        </li>
        @endforeach
    </ul>

</div>

@endsection
