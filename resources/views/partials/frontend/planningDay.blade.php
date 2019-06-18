@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
@if(isset($aPlanning))
<h1 class="planningDay">{!! $aPlanning->date !!}</h1>
<h2 class="planningDay">{!! $aPlanning->end_location !!}</h2>
<div class="planningDay">{!! $aPlanning->description !!}</div>
@else
<h1 class="planningDay">No dayplanning found.</h1>
@endif
@endsection

@section('scripts')
@endsection