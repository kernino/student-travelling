@extends('partials.backend.index')

@section('container')
<h1>Vervoer</h1>
<form method="POST" class="htmlEditor" action="/admin/vervoer">
    <div>
        <input type="hidden" value="{{ $AutoContent->auto_id ?? "" }}" name="auto_id" />
        
        @csrf
        
        <textarea cols="80" rows="12" id="auto_content" name="auto_content" required>
            {{ $AutoContent->auto_content ?? "" }}
        </textarea>
        
        <input type="submit" value="Opslaan" name="action"/>
        <input type="submit" value="Annuleren" name="action"/>
    </div>
</form>
@include('layouts.error')
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'auto_content' );</script>
@endsection