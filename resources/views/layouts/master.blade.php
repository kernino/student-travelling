<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Reisboek</title>
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"-->
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('styles')
    </head>
    <body>
        @yield('navbar')
        @yield('content')
    </body>
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('scripts')
</html>
