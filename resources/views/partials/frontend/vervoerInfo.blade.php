@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1 class="vervoer">Vervoer Informatie</h1>
<h2 class="vervoer">Extra informatie</h2>

@if(isset($sTransportationInfo))
<div style="margin-left: 1%;">{!! $sTransportationInfo !!}</div>
@else
<p class="vervoer">No transportation info found for this trip</p>
@endif
<hr>
<h2 class="vervoer">Auto</h2>
<h3 class="vervoer">Auto verdeling:</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table style="width:80%; margin-left: 10%; color: #3490dc; margin-top: 5%;" id="myTable" >
    @if(isset($aCars))
    @foreach ($aCars as $iCarId=>$aCar)
    <tr>
        <th style="border: 2px solid #3490dc; text-align: center;">Chauffeurs auto {{ $iCarId }}</th>
        @foreach ($aCar["drivers"] as $aDriver)
        <td style="border: 2px solid #3490dc; text-align: center;">{{ $aDriver->first_name }} {{ $aDriver->last_name }}<br>
        {{ $aDriver->phone }}</td>
        @endforeach
    </tr>
    
    <tr>
        <th style="border: 2px solid #3490dc; text-align: center;">Passagiers auto {{ $iCarId }}</th>
        @foreach ($aCar["passengers"] as $aPassenger)
        <td style="border: 2px solid #3490dc; text-align: center;">{{ $aPassenger->first_name }} {{ $aPassenger->last_name }}<br>
        {{ $aPassenger->major_name }}</td>
        
        @endforeach
    </tr>
    @endforeach
    @else
        <p style="border: 2px solid #3490dc; text-align: center; color: #3490dc; margin-top: 3%; width: 20%; margin-left: 40%;">No cars found for this trip</p>
    @endif
</table>
<script>
    function myFunction() {
      var input, filter, table, tr, td, i, allTd;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) 
      {
        allTd = tr[i].getElementsByTagName("td");
        for (j=0; j < allTd.length; j++)
        {
          td = allTd[j];
          if (td) 
          {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) 
              {
                  tr[i].style.display = "";
                  break;
              } 
              else 
              {
                  tr[i].style.display = "none";
              }
          } 
        }  
      }
    }
    </script>
@endsection

@section('scripts')
@endsection
