@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1 class="inlog">Welkom bij UCLL reizen</h1>
<h2 class="inlog">Gelieve uw reiscode in te geven</h2>
<form action="{{ route("saveCode") }}">
  <div class="form-group">
    <input type="text" class="form-control" name="code" id="code" placeholder="Reiscode..">
  </div>
  <button type="submit" id="inlogButton" class="btn btn-primary">Zoeken</button>
</form>
@endsection

@section('scripts')
@endsection