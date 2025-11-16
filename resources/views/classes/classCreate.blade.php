@extends('layouts.app')

@section('contenido')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 mt-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Crear Nueva Clase
        </h1>

        <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nombre --}}
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Nombre de la Clase:
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Ej: Yoga"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Descripción --}}
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">
                    Descripción:
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="4"
                    placeholder="Describe la clase..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Imagen --}}
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2">
                        Imagen de la Clase (opcional):
                </label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                <p class="text-gray-500 text-sm mt-1">Formatos: JPG, PNG, GIF (máx. 2MB)</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Vista previa --}}
            <div class="mb-6">
                <img 
                    id="preview" 
                    src="" 
                    alt="Vista previa" 
                    class="hidden w-full h-48 object-cover rounded-lg border-2 border-gray-300"
                />
            </div>

            {{-- NUEVO: Duración --}}
            <div class="mb-6">
                <label for="duration" class="block text-gray-700 font-semibold mb-2">
                        Duración (minutos):
                </label>
                <input 
                    type="number" 
                    id="duration" 
                    name="duration" 
                    value="{{ old('duration') }}"
                    placeholder="60"
                    min="30"
                    max="60"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
                @error('duration')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- CORREGIDO: max_capacity en lugar de capacity --}}
            <div class="mb-6">
                <label for="max_capacity" class="block text-gray-700 font-semibold mb-2">
                        Capacidad Máxima:
                </label>
                <input 
                    type="number" 
                    id="max_capacity" 
                    name="max_capacity" 
                    value="{{ old('max_capacity') }}"
                    placeholder="30"
                    min="1"
                    max="100"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
                @error('max_capacity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botones --}}
            <div class="flex gap-4 mt-8">
                <a 
                    href="{{ route('classes.index') }}" 
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition"
                >
                    Cancelar
                </a>
                <button 
                    type="submit"
                    class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition"
                >
                    Crear Clase
                </button>
            </div>
        </form>
    </div>

    {{-- JavaScript para vista previa --}}
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection