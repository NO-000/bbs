@extends('layouts.app')

@section('scripts')
<script src="{{ asset('js/fileinput/fileinput.min.js') }}" defer></script>
<script src="{{ asset('js/fileinput/locales/zh.js') }}" defer></script>
@endsection

@section('styles')
<link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class=" container row m-auto  justify-content-center">
    <div class="col-md-3">@yield('left')</div>
    <div class="col-md-8">@yield('right')</div>
</div>

@endsection
