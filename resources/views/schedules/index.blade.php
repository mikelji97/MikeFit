@extends('layouts.app')

@section('contenido')
    <div class="max-w-3xl mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Horarios</h1>
            <a href="{{ route('schedules.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Crear horario</a>
        </div>

        @forelse($schedules as $schedule)
            <div class="bg-white shadow rounded p-4 mb-3 flex justify-between items-center">
                <p class="font-semibold">
                    {{ $dias[$schedule->day_of_week] }}:
                    {{ $schedule->start_time }} - {{ $schedule->finish_time }}
                </p>
                <div class="flex gap-2">
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Editar</a>
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition"
                            onclick="return confirm('¿Estás seguro de eliminar este horario?')">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>No hay horarios aún.</p>
        @endforelse
    </div>
@endsection