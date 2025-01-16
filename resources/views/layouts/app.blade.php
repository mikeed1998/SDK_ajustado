<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Michael Eduardo - @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    @livewireStyles
</head>
<body>
    @include('layouts.partials.header')
    @yield('content')
    @livewireScripts

    @include('layouts.partials.footer')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
