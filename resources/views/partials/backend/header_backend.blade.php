<nav class="navbar navbar-expand-sm navbar-default fixed-top">
    <a class="navbar-brand" href="{{ url('/admin/') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav  ">

            <li class="nav-item ">
                    <a class="nav-link reis1" href="#">Reis internationaal</a>
            </li>	

            <li class="nav-item ">
                    <a class="nav-link reis2" href="#">Reis intercontinentaal</a>
            </li>

        </ul>
    </div>
</nav>
		
<nav class="hoofd-nav">
    <ol>
        <li><a href="{{ url('/admin/planning') }}">Planning</a></li>
        <li><a href="{{ url('/admin/info') }}">Algemene Info</a></li> 
        <li><a href="{{ url('/admin/hotel') }}">Hotels</a></li> 
        <li><a href="{{ url('/admin/vervoer') }}">Vervoer</a></li>
    </ol>
</nav>
