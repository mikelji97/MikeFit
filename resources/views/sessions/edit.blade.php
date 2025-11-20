@extends('layouts.app')

@section('contenido')
    <div class="max-w-[800px] mx-auto px-6 py-6">

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Editar Sesión</h3>
            </div>

            <form action="{{ route('sessions.update', $session->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="schedules_id" class="block text-sm font-semibold text-gray-700 mb-1">
                        Horario
                    </label>
                    <select id="schedules_id" name="schedules_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                        <option value="">Selecciona un horario</option>
                        @php
                            $dias = ['', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                        @endphp
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}"
                                {{ old('schedules_id', $session->schedules_id) == $schedule->id ? 'selected' : '' }}>
                                {{ $dias[$schedule->day_of_week] ?? $schedule->day_of_week }} -
                                {{ $schedule->start_time }} a {{ $schedule->finish_time }}
                            </option>
                        @endforeach
                    </select>
                    @error('schedules_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="classroom" class="block text-sm font-semibold text-gray-700 mb-1">
                        Sala
                    </label>
                    <input type="text" id="classroom" name="classroom" placeholder="Ej: Sala A, Sala 1"
                        value="{{ old('classroom', $session->classroom) }}"
                        class="w-full px-3 py-2 border border-gray-300">
                    @error('classroom')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">
                        Actualizar
                    </button>
                    <a href="{{ route('sessions.index', ['class_id' => $session->classes_id]) }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-semibold transition inline-block text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection