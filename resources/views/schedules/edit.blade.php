@extends('layouts.app')

@section('contenido')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Editar horario
        </h1>

        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" >
            @csrf
            @method('PUT')
@endsection
