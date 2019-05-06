@extends('partials.backend.index')

@section('container')
<h1>Algemene Info</h1>
<form action="form_handler.php" method="POST" class="htmlEditor">
    <div>
        {{ csrf_field() }}
        
        <textarea cols="80" rows="12" id="info_content" name="info_content"> 
        </textarea>
        
        <input type="submit" value="Opslaan" name="save"/>
        <input type="submit" value="Annuleren" name="cancel"/>
    </div>
</form>
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'info_content' );</script>
@endsection