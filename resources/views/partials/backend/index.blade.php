@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_backend.css') }}">
@endsection

@section('navbar')
    @include('partials.backend.header_backend')
@endsection

@section('content')
<div id="content_container">
    
    
    @if ( Route::current()->getName() == 'home_backend')   
        <p class="welkom">Welkom bij backend!</p>
        <hr>
    @else
        @yield('container')
    @endif    
</div>
 

@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{ mix('/js/backend.js') }}"></script>
@yield('page_specific_scripts')
@endsection