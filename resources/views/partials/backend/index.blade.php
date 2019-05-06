@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_backend.css') }}">
@endsection

@section('navbar')
    @include('partials.backend.header_backend')
@endsection

@section('content')
<div id="content_container">
    @yield('container')
</div>
    
@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{ mix('/js/backend.js') }}"></script>
@yield('page_specific_scripts')
@endsection