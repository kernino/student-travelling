<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Info
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('algmeen') }}">Algemene Info</a>
          <a class="dropdown-item" href="{{ route('hotel') }}">Hotel Info</a>
          <a class="dropdown-item" href="{{ route('vervoer') }}">Vervoer Info</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('planning') }}" tabindex="-1" aria-disabled="true">Planning</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}" tabindex="-1" aria-disabled="true">Contact</a>
      </li>
    </ul>
  </div>
</nav>