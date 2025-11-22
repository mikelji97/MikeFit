@extends('layouts.app')

@section('contenido')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mt-8">
        <h1 class="text-3xl text-center text-gray-800 mb-8">Crear Horario</h1>

        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Día:</label>
                <select name="day_of_week" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">Selecciona</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miércoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sábado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700  mb-2">Hora Inicio:</label>
                <input type="time" name="start_time" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700  mb-2">Hora Fin:</label>
                <input type="time" name="finish_time" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('classes.index') }}"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white py-3 rounded-lg text-center">
                    Cancelar
                </a>
                <button type="submit"
                    class="flex-1 bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg">
                    Crear
                </button>
            </div>
        </form>
    </div>
@endsection
