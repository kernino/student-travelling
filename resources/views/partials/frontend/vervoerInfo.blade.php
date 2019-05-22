@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>Vervoer Informatie</h1>
<h2>Vliegtuig</h2>
<div></div>
<!--<h3>Algemene info:</h3>
<p></p>-->
<hr>
<h2>Auto</h2>
<h3>Auto verdeling:</h3>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table style="width:100%" id="myTable">
    @foreach ($aCars as $iCarId=>$aCar)
    <tr>
        <th>Chauffeurs auto {{ $iCarId }}</th>
        @foreach ($aCar["drivers"] as $aDriver)
        <td>{{ $aDriver->first_name }}<br>
        {{ $aDriver->phone }}</td>
        @endforeach
    </tr>
    <tr>
        <th>Passagiers auto {{ $iCarId }}</th>
        @foreach ($aCar["passengers"] as $aPassenger)
        <td>{{ $aPassenger->first_name }}<br>
        {{ $aPassenger->phone }}</td>
        @endforeach
    </tr>
    @endforeach
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
