<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
          Info
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('algemeen') }}" style="color: #3490dc;">Algemene Info</a>
          <a class="dropdown-item" href="{{ route('hotel') }}" style="color: #3490dc;">Hotel Info</a>
          <a class="dropdown-item" href="{{ route('vervoer') }}" style="color: #3490dc;">Vervoer Info</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('planning') }}" tabindex="-1" aria-disabled="true" style="color: white;">Planning</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}" tabindex="-1" aria-disabled="true" style="color: white;">Contact</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
          Noodnummers
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if(isset($aEmergencyNumbers))
                @foreach($aEmergencyNumbers as $aEmergencyNumber)
                @if(isset($aEmergencyNumber->first_name))
                <p class="dropdown-item" style="color: #3490dc;">{{ $aEmergencyNumber->first_name }} {{ $aEmergencyNumber->last_name }} {{ $aEmergencyNumber->phone }}</p>
                @endif
                @endforeach
            @else
                <p class="dropdown-item" style="color: #3490dc;">No emergency numbers found for this trip</p>
            @endif
        </div>
      </li>
    </ul>
  </div>
</nav>