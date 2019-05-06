@extends('partials.backend.index')

@section('container')
<h1>Vervoer</h1>
<form method="POST" class="htmlEditor">
    <div>
        {{ csrf_field() }}
        
        <textarea cols="80" rows="12" id="transport_content" name="transport_content" required> 
        </textarea>
        
        <input type="submit" value="Opslaan" name="action"/>
        <input type="submit" value="Annuleren" name="action"/>
    </div>
</form>
@include('layouts.error')
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'transport_content' );</script>
@endsection