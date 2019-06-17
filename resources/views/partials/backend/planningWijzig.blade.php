@extends('partials.backend.index')

@section('container')
<h1>Dag {{$aDay}}: {{$aPlanning->name}}</h1>

<form method="POST" action="/admin/planning"  class="htmlEditor" style="margin-bottom: 20px;">
    <div>
        {{ csrf_field() }}
        
        <input type="hidden" value="{{$aPlanning->day_planning_id}}" name="planningId" />
        
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1; color: #000" 
                   id="planningName" name="planningName" value="{{$aPlanning->name}}">
        </div>
        <div class="form-group">
            <label for="end_location">Locatie:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1; color: #000" 
                   id="planningLocation" name="planningLocation" value="{{$aPlanning->end_location}}">
        </div>
        <div class="form-group">
            <label for="date">Datum:</label>
            <input type="date" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1; color: #000" 
                   id="planningDate" name="planningDate" value="{{$aPlanning->date}}">
        </div>
        <div class="form-group">
            <label for="highlight">Highlight:</label>
            <input type="text" class="form-control planningInput" style="background-color: #FFF; border:1px solid #d1d1d1; color: #000" 
                   id="planningHighlight" name="planningHighlight" value="{{$aPlanning->highlight}}">
        </div>
        
        <label for="highlight">Omschrijving:</label>
        <textarea cols="80" rows="12" id="planning_content" name="planning_content"> 
            {{$aPlanning->description}}
        </textarea>  
        
        @if(empty($aPlanning->day_planning_id))
            <input type="submit" value="Toevoegen" name="action"/>
            <input type="button" value="Annuleren" onclick="history.go(0)"/>
        @else
            <input type="submit" value="Opslaan" name="action"/>
            <input type="submit" value="Verwijderen" name="action"/>
            <input type="button" value="Annuleren" onclick="history.go(0)"/>
        @endif
        
        
        @include('layouts.error')
    </div>
</form>
@endsection

@section('page_specific_scripts')
    <script>CKEDITOR.replace( 'planning_content' );</script>
@endsection
