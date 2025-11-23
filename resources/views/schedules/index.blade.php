@extends('layouts.app')

@section('contenido')
    <div class="max-w-3xl mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Horarios</h1>
            <a href="{{ route('schedules.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Crear horario</a>
        </div>

        @forelse($schedules as $schedule)
            <div class="bg-white shadow rounded p-4 mb-3">
                <p class="font-semibold">
                    {{ $dias[$schedule->day_of_week] }}:
                    {{ $schedule->start_time }} - {{ $schedule->finish_time }}
                </p>
            </div>
        @empty
            <p>No hay horarios aún.</p>
        @endforelse
    </div>
@endsection
