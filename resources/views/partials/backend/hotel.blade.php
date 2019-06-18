@extends('partials.backend.index')

@section('container')
    <h1>Hotels</h1>
    @foreach ($aHotels as $hotel)
    <button type="button" onclick='changeDesc({{$hotel->hotel_name}})' class="btn btn-primary">{{ $hotel->hotel_name }}</button>
    @endforeach
    <form method="POST" class="htmlEditor">
    <div>
        {{ csrf_field() }} 
        <h3>Hotel info:</h3>
        <input type="hidden" value="vluchtInfo" name="info_type" />
        <textarea cols="80" rows="12" id="hotel_info" name="info_content"> 
        </textarea>
        
        <input type="submit" value="Opslaan" name="save"/>
        <input type="button" value="Annuleren" onclick="history.go(0)"/>
        
        @include('layouts.error')
    </div>
</form>
@endsection
@section('page_specific_scripts')
    <script>CKEDITOR.replace('info_content');</script>
    <script>
        function changeDesc($hotel)
        {
           var editor = document.getElementById("hotel_info");
           editor.value = $name;
       }
    </script>
@endsection