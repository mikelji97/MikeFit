{{-- Mensaje de éxito --}}
@if (session('success'))
    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="font-semibold">Operación correcta</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

{{-- Mensaje de error --}}
@if (session('error'))
    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="font-semibold">Ha ocurrido un error</p>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif

{{-- Errores de validación --}}
@if ($errors->any())
    <div class="mb-4 rounded-lg border border-yellow-200 bg-yellow-50 px-4 py-3 text-sm text-yellow-800">
        <p class="font-semibold mb-1">Por favor corrige los siguientes errores:</p>
        <ul class="list-disc list-inside space-y-0.5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
