@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1 class="contact">Telefoon nummers</h1>
    <h2 class="contact">Begeleiders</h2>
        <table style="width:80%; margin-left: 10%; color: #3490dc; margin-top: 2%; margin-bottom: 2%;">
            <tr>
            @foreach ($aContactData['mentors'] as $aBegeleider)

                <td style="border: 2px solid #3490dc; text-align: center;">{{ $aBegeleider->first_name }} {{ $aBegeleider->last_name }}<br>
                {{ $aBegeleider->phone }}</td>

            @endforeach
            </tr>
    </table>
    
    <hr>
    
    <h2 class="contact">Reizigers</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table style="width:80%; margin-left: 10%; color: #3490dc;" id="myTable"><tr>
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