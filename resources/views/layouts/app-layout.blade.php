<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- bootstrap css --}}
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        {{-- font awesome css --}}
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <title>Laravel</title>
    </head>
    <body>
        {{ $slot }}

        {{-- bootstrap js --}}
        <script type="module" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        {{-- fontawesome js --}}
        <script src="{{ asset('js/all.min.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js_file')
    </body>
</html>
