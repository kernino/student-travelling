<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>Reisboek</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        @include('partials.header_frontend')
        @yield('content')
        @include('partials.footer_frontend')
    </body>
</html>