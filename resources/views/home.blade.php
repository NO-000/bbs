@extends('layouts.topics-list')

@section('title','主页')


@section('list')
    <div class="card">

            <ul class="nav nav-pills nav-justified border-bottom-0" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link {{active_class(if_query('order','')||if_query('order','newReplies'))}} "  href="?order=newReplies">最近回复</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{active_class(if_query('order','newTopics'))}}"  href="?order=newTopics">最近发布</a>
                    </li>
                  </ul>


                  <ul class="list-group">
                        @foreach ($topics as $topic)

                        <li class="list-group-item list-group-item-action">
                            <div class="hidden-text float-left"><a href="{{$topic->id}}" title="{{$topic->title}}">{{$topic->title}}</a></div>
                            <small class=" float-right ">
                                    {{$topic->reply_count}}回复
                                    ·
                                    <span data-toggle="tooltip" title="{{$topic->updated_at}}">@if (!if_query('order','newTopics'))创建于@endif{{$topic->updated_at->diffForHumans()}}</span>
                                </small>
                        </li>

                        @endforeach
                      </ul>

                      @if (if_query('order','newTopics'))
                            <div class="pt-3 ml-3">{{$topics->appends(['order' => 'newTopics'])->links()}}</div>
                      @else
                            <div class="pt-3 ml-3">{{$topics->links()}}</div>
                      @endif

    </div>
@endsection
