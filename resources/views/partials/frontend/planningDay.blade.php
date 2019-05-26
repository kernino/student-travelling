@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>{{$planning->PlanningDag}}</h1>
<h2>{{$planning->Locatie}}</h2>
<div>{{$planning->DagInfo}}</div>
@endsection

@section('scripts')
@endsection