@extends('partials.backend.index')

@section('container')
    <h1>Hotels</h1>
    <form method="POST" class="htmlEditor" action="/admin/hotel">
        @if ($hotel_info != null)
        <input type="hidden" value="{{ $hotel_info[0]->hotel_id ?? "" }}" name="hotel_id" />
        @endif
    @foreach ($aHotels as $hotel)
    <input type="submit" value="{{$hotel->hotel_name}}" name="action" class="btn btn-primary"/>
    @endforeach
    <div>
        @csrf
        <h3>Hotel info:</h3>
        <input type="hidden" 
        <input type="hidden" value="vluchtInfo" name="info_type" />
        <textarea cols="80" rows="12" id="hotel_info" name="hotel_content">
        @if ($hotel_info != null)
        {{$hotel_info[0]->hotel_information}}
        @else
        {{$no_hotel}}
        @endif
        </textarea>
        <input type="submit" value="Opslaan" name="action"/>
        <input type="submit" value="Annuleren" name="action"/>
        
    </div>
</form>
@include('layouts.error')
@endsection
@section('page_specific_scripts')
    <script>CKEDITOR.replace('hotel_content');</script>
@endsection