@extends('layouts.users.default')

@section('title',$user->name . '修改资料中心')

@section('left')
    <div class="card">
            <ul class="nav nav-pills flex-column  text-center" role="tablist">
                    <li class="nav-item ">
                      <a class="nav-link active list-group-item list-group-item-action" data-toggle="pill" href="#basic">修改基本资料</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link list-group-item list-group-item-action" data-toggle="pill" href="#avatar">修改头像</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link list-group-item list-group-item-action" data-toggle="pill" href="#email">修改邮箱</a>
                    </li>
                  </ul>
    </div>
@endsection

@section('right')
    <div class="card bg-secondary text-white" style="height:80vh">

        @include('common.error')

        @include('layouts._message')

        <div class="tab-content ">

                @include('users.edit._basic')

                 @include('users.edit._avatar')


        </div>
    </div>
@endsection
