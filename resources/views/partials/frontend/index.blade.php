@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>{{ $aHomeData["place"] }}</h1>
<h2>{{ $aHomeData["start_date"] }} - {{ $aHomeData["end_date"] }}</h2>
<h4>Reiscode: {{ $aHomeData["travelcode"] }}</h4>

@endsection

@section('scripts')
@endsection