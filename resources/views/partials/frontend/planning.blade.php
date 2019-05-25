@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>Planning</h1>
        @foreach ($locations as location)
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{Planning->locatieFoto}}" alt="{{Planning->locatieNaam}}">
          <div class="card-body">
            <h5 class="card-title">{{Planning->locatieNaam}}</h5>
            <p class="card-text">{{Planning->periode}}</p>
            @foreach ($locations as location => periode(dag))
            <a href="#" class="btn btn-primary">{{Planning->periodedag}}</a>
            @endforeach
          </div>
        </div>
        @endforeach
@endsection

@section('scripts')
@endsection