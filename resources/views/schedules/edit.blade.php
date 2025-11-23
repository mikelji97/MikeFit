@extends('layouts.app')
@section('contenido')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Editar horario
        </h1>

        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2">Día</label>
                <input type="number" name="day_of_week" min="1" max="7" value="{{ $schedule->day_of_week }}"
                    class="w-full border rounded p-2">
                <p class="text-gray-500">1=Lun, 2=Mar, 3=Mié, 4=Jue, 5=Vie, 6=Sáb, 7=Dom</p>
            </div>

            <div class="mb-4">
                <label class="block mb-2">Hora inicio</label>
                <input type="time" name="start_time" value="{{ substr($schedule->start_time, 0, 5) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Hora fin</label>
                <input type="time" name="finish_time" value="{{ substr($schedule->finish_time, 0, 5) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="flex gap-4 mt-8">
                <a href="{{ route('schedules.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center">
                    Cancelar
                </a>
                <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection