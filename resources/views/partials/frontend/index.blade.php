@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')

<h1>{{ $aHomeData->destination }}</h1>
<p>{{ $aHomeData->start_date }} - {{ $aHomeData->end_date }}</p>

@endsection

@section('scripts')
@endsection