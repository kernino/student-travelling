@extends('layouts.master')

@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ mix('css/_frontend.css') }}">
@endsection

@section('navbar')
    @include('partials.frontend.header_frontend')
@endsection

@section('content')
<h1 class="hotel">Hotel Info</h1>
            @foreach ($aHotels as $hotel)
            <button type="button" id="hotelbtn" class="btn btn-primary">{{ $hotel->hotel_name }}</button>
            @endforeach
    <h3 class="hotel">Algemene info:</h3>
    <p class="hotel">{{ $aHotels[0]->hotel_information }}</p>
    <h3 class="hotel">Adres:</h3>
    <p class="hotel">{{ $aHotels[0]->address }}</p>
    <hr>
    <h2 class="hotel">Kamer indeling</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table style="width:80%; margin-left: 10%" id="myTable">
        @foreach ($aRoomInfo as $iRoomId => $aTravellers)
        <tr>
            <th style="color: #3490dc; border: 2px solid #3490dc; text-align: center;">Kamer {{ $iRoomId }}</th>
            @foreach ($aTravellers as $aTraveller)
            <td style="color: #3490dc; border: 2px solid #3490dc; text-align: center;">
                {{ $aTraveller->first_name }} {{ $aTraveller->last_name }}
                <br>
                @if(isset($aTraveller->major_name))
                {{ $aTraveller->major_name }}
                @else
                Begeleider
                @endif
            </td>
            @endforeach
        </tr>
        <br>
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

              if (td.innerHTML.toUpperCase().includes(filter)) 
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
    </script>

@endsection

@section('scripts')
@endsection
