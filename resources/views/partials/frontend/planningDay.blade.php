@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>{{$aPlanning->date}}</h1>
<h2>{{$aPlanning->end_location}}</h2>
<div>{{$aPlanning->description}}</div>
@endsection

@section('scripts')
@endsection