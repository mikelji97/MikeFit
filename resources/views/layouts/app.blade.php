
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MikeFit - Reserva de Clases</title>
    {{-- Tailwind CSS desde CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#d6e7e0] min-h-screen">
    
    {{-- Navbar con Tailwind --}}
    <nav class="bg-white shadow-md px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800 hover:text-gray-600">
                    MikeFit
            </a>
        </div>
    </nav>

    {{-- Contenedor principal --}}
    <main>
        {{-- Mensajes flash --}}
        @include('partials.mensajes')

        {{-- Contenido de cada vista --}}
        @yield('contenido')
    </main>
</body>
</html>
