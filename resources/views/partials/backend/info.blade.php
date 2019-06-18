@extends('partials.backend.index')

@section('container')
<h1>Algemene Info</h1>
<hr>
<form method="POST" class="htmlEditor" action="/admin/info">
    <div>
        @csrf
        
        <input type="hidden" value="{{ $info_content->info_id ?? "" }}" name="info_id" />
        
        <textarea cols="80" rows="12" id="info_content" name="info_content" required>
            {{ $info_content->content ?? "" }}
        </textarea>
        
        <input type="submit" value="Opslaan" name="action"/>
        <input type="submit" value="Annuleren" name="action"/>
    </div>
</form>
@include('layouts.error')
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'info_content',{ height:450} ); </script>

@endsection