@extends('layouts.app')

@section('contenido')
    <div class="min-h-screen bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50">
        <div class="max-w-[1200px] mx-auto px-6 py-8">

            {{-- Header mejorado --}}
            <header class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 mb-8 border border-white">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                        MikeFit
                    </h1>

                    <div class="flex gap-3 flex-wrap items-center">
                        <form class="flex gap-2" method="GET" action="{{ url()->current() }}">
                            <input type="text" name="q" value="{{ request('q') }}"
                                placeholder="Buscar clase..."
                                class="px-5 py-2.5 border-2 border-gray-200 rounded-xl min-w-[240px] focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all" />
                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 shadow-md hover:shadow-lg transition-all">
                                Buscar
                            </button>
                        </form>
                        <a href="{{ route('classes.create') }}"
                            class="px-6 py-2.5 bg-emerald-500 text-white rounded-xl font-semibold hover:bg-emerald-600 shadow-md hover:shadow-lg transition-all">
                            + Nueva Clase
                        </a>
                    </div>
                </div>
            </header>

            {{-- Grid de clases --}}
            @if (isset($classes) && count($classes))
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($classes as $class)
                        <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">

                            {{-- Imagen --}}
                            <div class="relative overflow-hidden group">
                                @if ($class->image)
                                    <img src="{{ asset('storage/' . $class->image) }}" alt="Imagen de {{ $class->name }}"
                                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500" />
                                @else
                                    <div class="w-full h-48 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 group-hover:scale-110 transition-transform duration-500"></div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>

                            {{-- Contenido --}}
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $class->name }}</h2>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ $class->description ?? 'Clase del gimnasio para todos los niveles.' }}
                                </p>

                                {{-- Badges --}}
                                <div class="flex gap-2 flex-wrap mb-5">
                                    @if (isset($class->duration))
                                        <span class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-sm font-semibold border border-blue-100">
                                            {{ $class->duration }} min
                                        </span>
                                    @endif

                                    @if (isset($class->max_capacity))
                                        <span class="bg-purple-50 text-purple-700 px-3 py-1.5 rounded-lg text-sm font-semibold border border-purple-100">
                                            {{ $class->max_capacity }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Botones --}}
                                <div class="flex gap-2 flex-wrap">
                                    <a href="{{ route('sessions.index', ['class_id' => $class->id]) }}"
                                        class="flex-1 text-center px-4 py-2.5 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 shadow-md hover:shadow-lg transition-all">
                                        Ver sesiones
                                    </a>
                                    <a href="{{ route('classes.edit', $class->id) }}"
                                        class="px-4 py-2.5 bg-emerald-500 text-white rounded-xl font-semibold hover:bg-emerald-600 shadow-md hover:shadow-lg transition-all">
                                        Editar
                                    </a>
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-4 py-2.5 bg-red-500 text-white rounded-xl font-semibold hover:bg-red-600 shadow-md hover:shadow-lg transition-all"
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
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-16 text-center border border-gray-100">
                    <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">No hay clases disponibles</h3>
                    <p class="text-gray-500 mb-6">Comienza creando tu primera clase</p>
                    <a href="{{ route('classes.create') }}"
                        class="inline-block px-6 py-3 bg-emerald-500 text-white rounded-xl font-semibold hover:bg-emerald-600 shadow-md hover:shadow-lg transition-all">
                        + Nueva Clase
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection