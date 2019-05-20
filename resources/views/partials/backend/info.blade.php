@extends('partials.backend.index')

@section('container')
<h1>Info</h1>

<form action="{{ Request::url() }}/algemeneinfo" method="POST" class="htmlEditor">
    <div>
        {{ csrf_field() }}
        
        <h3>Algemene info:</h3>
        <input type="hidden" value="algemeneInfo" name="info_type" />
        <textarea cols="80" rows="12" id="algemene_info_content" name="info_content"> 
        </textarea>
        
        <input type="submit" value="Opslaan" name="save"/>
        <input type="button" value="Annuleren" onclick="history.go(0)"/>
        
        @include('layouts.error')
    </div>
</form>
<hr>
<form action="{{ Request::url() }}/vlucht" method="POST" class="htmlEditor">
    <div>
        {{ csrf_field() }} 
        <h3>Vlucht info:</h3>
        <input type="hidden" value="vluchtInfo" name="info_type" />
        <textarea cols="80" rows="12" id="vlucht_info_content" name="info_content"> 
        </textarea>
        
        <input type="submit" value="Opslaan" name="save"/>
        <input type="button" value="Annuleren" onclick="history.go(0)"/>
        
        @include('layouts.error')
    </div>
</form>
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'algemene_info_content' );</script>
    <script>CKEDITOR.replace( 'vlucht_info_content' );</script>
@endsection