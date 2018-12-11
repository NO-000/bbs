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
        @can('ownTopic', $topic)

        <div class="row mt-3 ml-3">

                <button class="btn btn-info " data-toggle="modal" data-target="#edit">修改</button>

            <form action="{{ route('topics.destroy',$topic->id)}}" method="POST">

                @method('DELETE')

                @csrf

                <button type="submit" class="btn btn-danger ml-3">删除</button>
            </form>

        </div>
        @endcan

    </div>
</div>

<br>
@if (Auth::check())

<form action="{{ route('replies.store')}}" method="POST">

    @csrf

    <textarea class="form-control" rows="3" id="reply" name="content" placeholder="Balabala" autofocus></textarea>

    <input type="hidden" name="topic_id" value="{{$topic->id}}">

    <button type="submit" class="btn btn-primary">发送</button>

</form>
@endif

<br>

<ul class="list-group">
    @foreach ($replies as $reply)
    <li class="list-group-item">

        <div class="float-left pr-2 card border-0"> <img class="border" src="{{ asset(Storage::url($reply->user->avatar)) }}"
                width="50" height="50">
            @can('ownReply', $reply)

            <form action="{{ route('replies.destroy', $reply->id) }}" method="POST">

                @method('DELETE')

                @csrf

                <button class="badge badge-danger">删除</button>

            </form>

            @endcan
        </div>

        <div class="card border-0">
            <small>
                <a href="{{route('users.show',$reply->user->id)}}">{{$reply->user->name}}</a> · <span data-toggle="tooltip"
                    title="{{$reply->created_at}}">{{$reply->created_at->diffForHumans()}}</span>
            </small>
            <span>{!! $reply->content !!}</span>
        </div>
    </li>
    @endforeach
</ul>

@include('topics._edit')

<script>
    $(document).ready(function () {
        var editor = new Simditor({
            textarea: $('#reply'),
            upload: {
                url: '{{ route('topics.upload_image') }}',
                params: { _token: '{{ csrf_token() }}' },
                fileKey: 'upload_file',
                connectionCount: 10,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage: true,
        })
    });
</script>
@endsection
