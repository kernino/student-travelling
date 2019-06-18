<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-left">
    <a class="navbar-brand" href="{{ url('/admin/') }}"><img src="{{ asset('images/logo_1.png') }}" alt="logo"></a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/planning') }}">Planning</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/info') }}">Algemene Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/admin/hotel') }}">Hotels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/vervoer') }}">Vervoer</a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kies je reis</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item reis1">Reis internationaal</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item reis2">Reis intercontinentaal</a>
                </div>
            </li>
        </ul>
        
    </div>
</nav>

