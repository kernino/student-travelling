<nav class="navbar navbar-expand-sm navbar-default ">
    <a class="navbar-brand" href="{{ url('/admin/') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
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
        <li><a href="#">Planning</a></li>
        <li><a href="{{ url('/admin/info') }}">Info</a></li> 
        <li><a href="#">Hotels</a></li>
        <li><a href="#">Contacten</a></li>
    </ol>
</nav>