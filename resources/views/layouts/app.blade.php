<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Michael Eduardo - @yield('title')
    </title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    @yield('styles')
</head>
<body>
    @include('layouts.partials.header')
    @yield('content')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
    
     <script>
        // Pasa las rutas y el token en un objeto global en el HTML
        window.appData = {
            RUTA_VALIDAR_CAMPO: '{{ route('front.validarCampo') }}',
            RUTA_ENVIAR_FORMULARIO: '{{ route('front.formularioContacto') }}',
            CSRF_TOKEN: '{{ csrf_token() }}'
        };
    </script>

    @include('layouts.partials.footer')
    @yield('scripts')
</body>
</html>
