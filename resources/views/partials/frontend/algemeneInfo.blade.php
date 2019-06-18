@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')

<div style="margin-left: 1%;">{{ $sAlgemeneInfo->content }}</div>

@endsection

@section('scripts')
@endsection
