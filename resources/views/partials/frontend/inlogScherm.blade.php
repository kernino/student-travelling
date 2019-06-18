@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
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


<!-- error Modal -->
<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="ErrorModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ErrorModalTitle">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              Trip not found
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn1">Sluiten</button>
          </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@if($bError)
  <script> $('#ErrorModal').modal('show');</script>
@endif
@endsection