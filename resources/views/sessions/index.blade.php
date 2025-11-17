@extends('layouts.app')

@section('contenido')
    <div class="max-w-[1100px] mx-auto px-6 py-6">

        {{-- Encabezado --}}
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold mb-2">{{ $class->name }}</h1>
            <p class="text-gray-600 mb-4">{{ $class->description }}</p>

            <div class="flex gap-3">
                <a href="{{ route('classes.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                    ← Volver
                </a>
            </div>
        </div>

        {{-- Lista de sesiones --}}
        @if (isset($sessions) && count($sessions) > 0)
            <div class="grid gap-4">
                @foreach ($sessions as $session)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        @if ($session->schedule)
                            <p><strong>Horario:</strong>
                                {{ $session->schedule->day_of_week }} -
                                {{ $session->schedule->start_time }} a
                                {{ $session->schedule->end_time }}
                            </p>
                        @endif
                        <p><strong>Sala:</strong> {{ $session->classroom }}</p>
                        <p><strong>Capacidad:</strong> {{ $session->current_capacity }} / {{ $class->max_capacity }}</p>
                        <p><strong>Creada:</strong> {{ $session->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Mensaje cuando no hay sesiones --}}
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <h3 class="text-xl font-semibold mb-2">No hay sesiones programadas para esta clase</h3>
                <p class="text-gray-500">Las sesiones se mostrarán aquí cuando estén disponibles</p>
            </div>
        @endif
    </div>
@endsection
