@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1>Telefoon nummers</h1>
    <h2>Begeleiders</h2>
        <table>
        @foreach ($aContactData['mentors'] as $aBegeleider)
        <tr>
            <td>{{ $aBegeleider->first_name }} {{ $aBegeleider->last_name }}<br>
            {{ $aBegeleider->phone }}</td>
        </tr>
        @endforeach
    </table>
    
    <hr>
    
    <h2>Reizigers</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table style="width:100%" id="myTable">
        @foreach ($aContactData['students'] as $aStudents)
        <tr>
            <td>
                {{ $aStudents->first_name }} {{ $aStudents->last_name }}
                <br>
                {{ $aStudents->major_name }}
                <br>
                {{ $aStudents->phone }}
            </td>
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