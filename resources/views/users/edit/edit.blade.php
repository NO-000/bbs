@extends('layouts.users.default')

@section('title',$user->name . '修改资料中心')

@section('left')



    <div class="card">
            <ul class="nav nav-pills flex-column  text-center">
                    <li class="nav-item ">
                        <a class="nav-link list-group-item list-group-item-action {{active_class(if_query('tab',''))}} {{active_class(if_query('tab','basic'))}} " href="?tab=basic">修改基本资料</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link list-group-item list-group-item-action {{active_class(if_query('tab','avatar'))}} " href="?tab=avatar">修改头像</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link list-group-item list-group-item-action {{active_class(if_query('tab','email'))}} " href="?tab=email">修改邮箱</a>
                    </li>
                  </ul>
    </div>
@endsection

@section('right')
    <div class="card bg-secondary text-white" style="height:90vh">

        @include('common.error')

        @include('layouts._message')


                @if (if_query('tab','')||if_query('tab','basic'))

                    @include('users.edit._basic')

                @elseif(if_query('tab','avatar'))

                    @include('users.edit._avatar')

                @else

                @endif





    </div>




@endsection
