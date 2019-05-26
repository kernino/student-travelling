@extends('partials.backend.index')

@section('container')
<h1>Dag 1</h1>

<form action="{{ Request::url() }}/save" method="POST" class="htmlEditor" style="margin-bottom: 20px;">
    <div>
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1;">
        </div>
        <div class="form-group">
            <label for="end_location">Locatie:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1;">
        </div>
        <div class="form-group">
            <label for="date">Datum:</label>
            <input type="date" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1; color: #000">
        </div>
        <div class="form-group">
            <label for="highlight">Highlight:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1;">
        </div>
        
        <label for="highlight">Omschrijving:</label>
        <textarea cols="80" rows="12" id="algemene_info_content" name="planning_content"> 
        </textarea>        
        <input type="submit" value="Opslaan" name="save"/>
        <input type="button" value="Annuleren" onclick="history.go(0)"/>
        
        @include('layouts.error')
    </div>
</form>
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'planning_content' );</script>
@endsection
