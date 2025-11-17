@extends('layouts.app')

@section('contenido')
    <div class="max-w-[1100px] mx-auto px-6 py-6">

        {{-- Encabezado mejorado --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-450 rounded-xl shadow-lg p-6 mb-6 text-white">
            <h1 class="text-3xl font-bold mb-2">{{ $class->name }}</h1>
            <p class="text-blue-50 mb-4">{{ $class->description }}</p>

            <div class="flex gap-3 items-center">
                <span class="bg-white/20 px-3 py-1.5 rounded-full text-sm">
                    {{ $class->duration }} min
                </span>
                <span class="bg-white/20 px-3 py-1.5 rounded-full text-sm">
                    {{ $class->max_capacity }} personas
                </span>
                <a href="{{ route('classes.index') }}"
                    class="ml-auto bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 font-semibold">
                    ← Volver
                </a>
            </div>
        </div>

        {{-- Lista de sesiones mejorada --}}
        @if (isset($sessions) && count($sessions) > 0)
            @php
                $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            @endphp
            
            <div class="grid gap-4">
                @foreach ($sessions as $session)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 border-l-4 border-blue-500">
                        @if ($session->schedule)
                            <p class="mb-2">
                                <span class="text-gray-500">Horario:</span>
                                <span class="font-semibold">{{ $dias[$session->schedule->day_of_week] ?? $session->schedule->day_of_week }}</span> -
                                {{ $session->schedule->start_time }} a {{ $session->schedule->end_time }}
                            </p>
                        @endif
                        <p class="mb-2">
                            <span class="text-gray-500">Sala:</span>
                            <span class="font-semibold">{{ $session->classroom }}</span>
                        </p>
                        <p class="mb-2">
                            <span class="text-gray-500">Capacidad:</span>
                            <span class="font-semibold">{{ $session->current_capacity }} / {{ $class->max_capacity }}</span>
                        </p>
                        <p class="text-sm text-gray-400">
                            Creada: {{ $session->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Mensaje cuando no hay sesiones --}}
            <div class="bg-white rounded-xl shadow-md p-12 text-center">
                <div class="text-5xl mb-4">📅</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No hay sesiones programadas para esta clase</h3>
                <p class="text-gray-500">Las sesiones se mostrarán aquí cuando estén disponibles</p>
            </div>
        @endif
    </div>
@endsection