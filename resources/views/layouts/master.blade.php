<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Reisboek</title>
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
