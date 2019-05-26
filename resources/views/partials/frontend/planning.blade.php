@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>Planning</h1>
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
@endsection

@section('scripts')
@endsection
