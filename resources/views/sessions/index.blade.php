@extends('layouts.app')

@section('contenido')
    <div class="max-w-[1100px] mx-auto px-6 py-6">

        {{-- Encabezado --}}
        <div class="bg-gray-400 rounded-xl shadow-lg p-6 mb-6 text-white">
            <h1 class="text-3xl font-bold mb-2">{{ $class->name }}</h1>
            <p class="text-white mb-4">{{ $class->description }}</p>

            <div class="flex gap-3 items-center">
                <span class="bg-white/20 px-3 py-1.5 rounded-full text-sm">
                    {{ $class->duration }} min
                </span>
                <span class="bg-white/20 px-3 py-1.5 rounded-full text-sm">
                    {{ $class->max_capacity }} personas
                </span>
                <a href="{{ route('classes.index') }}"
                    class="ml-auto bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-50 font-semibold">
                    <-- Volver
                </a>
            </div>
        </div>

        {{-- FORMULARIO PARA CREAR SESIÓN --}}
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Crear Nueva Sesión</h3>

            <form action="{{ route('sessions.store') }}" method="POST" class="flex flex-wrap gap-3 items-end">
                @csrf
                <input type="hidden" name="classes_id" value="{{ $class->id }}">
                <div class="flex-1">
                    <label for="schedules_id" class="block text-sm font-semibold text-gray-700 mb-1">
                        Horario
                    </label>
                    <select id="schedules_id" name="schedules_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg ">
                        <option value="">Selecciona un horario</option>
                        @php
                            $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                        @endphp
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}"
                                {{ old('schedules_id') == $schedule->id ? 'selected' : '' }}>
                                {{ $dias[$schedule->day_of_week] ?? $schedule->day_of_week }} -
                                {{ $schedule->start_time }} a {{ $schedule->finish_time }}
                            </option>
                        @endforeach
                    </select>
                    @error('schedules_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sala --}}
                <div class="flex-1 min-w-[200px]">
                    <label for="classroom" class="block text-sm font-semibold text-gray-700 mb-1">
                        Sala
                    </label>
                    <input type="text" id="classroom" name="classroom" required placeholder="Ej: Sala A, Sala 1"
                        value="{{ old('classroom') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    @error('classroom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botón --}}
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                    Crear Sesión
                </button>
            </form>
        </div>

        {{-- Lista de sesiones --}}
        @if (isset($sessions) && count($sessions) > 0)
            @php
                $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            @endphp
            <div class="grid gap-4">
                @foreach ($sessions as $session)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-start">
                            {{-- Izquierda: Info --}}
                            <div>
                                @if ($session->schedule)
                                    <p class="mb-2">
                                        <span class="text-gray-500">Horario:</span>
                                        <span
                                            class="font-semibold">{{ $dias[$session->schedule->day_of_week] ?? $session->schedule->day_of_week }}</span>
                                        - {{ $session->schedule->start_time }} a {{ $session->schedule->finish_time }}
                                    </p>
                                @endif
                                <p class="mb-2">
                                    <span class="text-gray-500">Sala:</span>
                                    <span class="font-semibold">{{ $session->classroom }}</span>
                                </p>
                                <p class="mb-2">
                                    <span class="text-gray-500">Capacidad:</span>
                                    <span class="font-semibold">{{ $session->current_capacity }} /
                                        {{ $class->max_capacity }}</span>
                                </p>
                                <p class="text-sm text-gray-400">
                                    Creada: {{ $session->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full px-4 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-semibold"
                                        onclick="return confirm('¿Estás seguro de eliminar esta sesión?')">
                                        Eliminar
                                    </button>
                                </form>
                                <a href="{{ route('sessions.edit', $session->id) }}"
                                    class="block text-center px-4 py-2.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition font-semibold">
                                    Editar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- Mensaje cuando no hay sesiones --}}
            <div class="bg-white rounded-xl shadow-md p-12 text-center">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">No hay sesiones programadas para esta clase</h3>
                <p class="text-gray-500">Las sesiones se mostrarán aquí cuando las crees arriba</p>
            </div>
        @endif
    </div>
@endsection
