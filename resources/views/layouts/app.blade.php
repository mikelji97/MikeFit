<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Clases</title>

    {{-- Bootstrap desde CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    {{-- Estilos/JS con Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Navbar simple --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
        <a class="nav-link" href="{{ route('classes.create') }}">Reservar clase</a>
    </nav>

    {{-- Contenedor principal --}}
    <main class="container py-4">
        {{-- Mensajes flash (éxito, error, etc.) --}}
        @include('partials.mensajes')

        {{-- Contenido de cada vista --}}
        @yield('contenido')
    </main>
</body>
</html>
