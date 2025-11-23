@extends('layouts.app')


@section('contenido')
    <div class="max-w-[1200px] mx-auto px-6 py-8">

        {{-- Header mejorado --}}
        <header class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <h1 class="text-3xl font-bold text-gray-800">MikeFit</h1>

                <div class="flex gap-3 flex-wrap items-center">
                    <form class="flex gap-2" method="GET" action="{{ url()->current() }}">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar clase..."
                            class="px-4 py-2.5 border border-gray-300 rounded-lg min-w-[240px]">
                        <button type="submit"
                            class="px-5 py-2.5 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                            Buscar
                        </button>
                    </form>
                    <a href="{{ route('classes.create') }}"
                        class="px-5 py-2.5 bg-gray-400 text-white rounded-lg font-semibold hover:bg-gray-600 transition">
                        + Nueva Clase
                    </a>
                    <a href="{{ route('schedules.index') }}"
                        class="px-5 py-2.5 bg-gray-400 text-white rounded-lg font-semibold hover:bg-gray-600 transition">
                        Ver horarios
                    </a>
                </div>
            </div>
        </header>

        {{-- Grid de clases --}}
        @if (isset($classes) && count($classes))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($classes as $class)
                    <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">

                        {{-- Imagen --}}
                        @if ($class->image)
                            <img src="{{ asset('storage/' . $class->image) }}" alt="Imagen de {{ $class->name }}"
                                class="w-full h-48 object-cover" />
                        @else
                            <div class="w-full h-48 bg-blue-50"></div>
                        @endif

                        {{-- Contenido --}}
                        <div class="p-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $class->name }}</h2>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $class->description ?? 'Clase del gimnasio para todos los niveles.' }}
                            </p>

                            {{-- Badges --}}
                            <div class="flex gap-2 flex-wrap mb-4">
                                @if (isset($class->duration))
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $class->duration }} min
                                    </span>
                                @endif

                                @if (isset($class->max_capacity))
                                    <span
                                        class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $class->max_capacity }} pers
                                    </span>
                                @endif
                            </div>

                            {{-- Botones --}}
                            <div class="flex gap-2 flex-wrap">
                                <a href="{{ route('sessions.index', ['class_id' => $class->id]) }}"
                                    class="flex-1 text-center px-4 py-2.5 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                                    Ver sesiones
                                </a>
                                <a href="{{ route('classes.edit', $class->id) }}"
                                    class="px-4 py-2.5 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 transition">
                                    Editar
                                </a>
                                <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-4 py-2.5 bg-red-500 text-white rounded-lg font-semibold hover:bg-red-600 transition"
                                        onclick="return confirm('¿Estás seguro de eliminar esta clase?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            {{-- Mensaje vacío --}}
            <div class="bg-white rounded-xl shadow-md p-16 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No hay clases disponibles</h3>
                <p class="text-gray-500 mb-6">Comienza creando tu primera clase</p>
                <a href="{{ route('classes.create') }}"
                    class="inline-block px-6 py-3 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 transition">
                    + Nueva Clase
                </a>
            </div>
        @endif
    </div>
@endsection
