<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Reisboek</title>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('styles')
    </head>
    <body>
        @yield('navbar')
        @yield('content')
    </body>
    @yield('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
</html>
