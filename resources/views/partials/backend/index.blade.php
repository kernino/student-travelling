@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_backend.css') }}">
@endsection

@section('navbar')
    @include('partials.backend.header_backend')
@endsection

@section('content')
    <h1>Index page backend</h1>
@endsection

@section('scripts')
@endsection