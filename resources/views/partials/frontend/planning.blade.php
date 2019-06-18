@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1 class="planning">Planning</h1>
@if(isset($aPlanning))
@foreach ($aPlanning as $location => $dayPlannings)
<div class="card mx-auto" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">{{$location}}</h5>
    @foreach ($dayPlannings as $day)
    <a href="{{ route('DayPlanning',[ "id" => $day->day_planning_id]) }}" class="btn btn-primary">{{$day->date}}</a>
    @endforeach
  </div>
</div>
@endforeach
@else
<p style="border: 2px solid #3490dc; text-align: center; color: #3490dc; margin-top: 3%; width: 20%; margin-left: 40%;">No planning found for this trip.</p>
@endif

@endsection

@section('scripts')
@endsection
