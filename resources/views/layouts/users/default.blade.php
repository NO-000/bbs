@extends('layouts.app')

@section('content')
<div class=" container row m-auto  justify-content-center">
    <div class="col-md-3">@yield('left')</div>
    <div class="col-md-8">@yield('right')</div>
</div>

@endsection
