@extends('partials.backend.index')

@section('container')
<h1>Extra vervoers informatie</h1>
<form method="POST" class="htmlEditor" action="/admin/vervoer">
    <div>
        @csrf
        
        <input type="hidden" value="{{ $vervoer_content->trip_id ?? "" }}" name="vervoer_id" />
        
        <textarea cols="80" rows="12" id="vervoer_content" name="vervoer_content" required>
            {{ $vervoer_content->transportation_info ?? "" }}
        </textarea>
        
        <input type="submit" value="Opslaan" name="action"/>
        <input type="submit" value="Annuleren" name="action"/>
    </div>
</form>
@include('layouts.error')
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'vervoer_content' );</script>
@endsection