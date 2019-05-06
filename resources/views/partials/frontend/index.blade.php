@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>{{ homeData->title }}</h1>
<h2>{{ homeData->startDate }} - {{ homeData->endDate }}</h2>
<h4>Reiscode: {{ homeData->travelCode }}</h4>

@endsection

@section('scripts')
@endsection