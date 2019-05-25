@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
    
    <h2>Contacten</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table style="width:100%" id="myTable">
        @foreach ($aStudyNames as $iStudyName => $aTravellers)
        <tr>
            <th>Klas: {{ $iStudyName }}</th>
            @foreach ($aTravellers as $aTraveller)
            <td>{{ $aTraveller->first_name }}<br>
            {{ $aTraveller->phone }}</td>
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