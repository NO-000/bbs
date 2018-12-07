@extends('layouts.app')

@section('content')
<div class=" container row m-auto  justify-content-center">
    <div class="col-md-8">@yield('list')</div>

    <div class="col-md-3">
        <div class="card">none</div>
    </div>
</div>

@endsection
