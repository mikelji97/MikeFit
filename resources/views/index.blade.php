@extends('layouts.app')

@section('contenido')
    <div class="max-w-[1100px] mx-auto px-6 py-6">
        
        {{-- Header --}}
        <header class="flex items-center justify-between mb-6 flex-wrap gap-4">
            <div class="text-[28px] font-semibold tracking-wide">MikeFit</div>

            <form class="flex gap-2 flex-wrap" method="GET" action="{{ url()->current() }}">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    placeholder="Buscar clase (yoga, spinning, etc.)"
                    class="px-3 py-2.5 border border-gray-300 rounded-[10px] min-w-[240px]"
                />
                <button 
                    type="submit"
                    class="px-3 py-2.5 bg-[#eef2f7] text-[#0f172a] rounded-[10px] font-semibold hover:bg-[#e2e8f0]"
                >
                    Buscar
                </button>
            </form>
        </header>

        {{-- Grid de clases --}}
        @if(isset($classes) && count($classes))
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($classes as $class)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-[0_6px_24px_rgba(0,0,0,0.06)] flex flex-col">
                        
                        {{-- Imagen --}}
                        @if(!empty($class->image))
                            <img 
                                src="{{ asset('storage/' . $class->image) }}" 
                                alt="Imagen de {{ $class->name }}"
                                class="block w-full aspect-[4/3] object-cover"
                            />
                        @else
                            <div class="block w-full aspect-[4/3] bg-gradient-to-br from-[#667eea] to-[#764ba2]"></div>
                        @endif

                        {{-- Contenido --}}
                        <div class="px-4 pt-4 pb-2">
                            <h2 class="text-lg font-bold mb-1.5">{{ $class->name }}</h2>
                            
                            <p class="text-gray-600 text-sm leading-[1.45] mb-2.5 min-h-[2.9em]">
                                {{ $class->description ?? 'Clase del gimnasio para todos los niveles.' }}
                            </p>

                            {{-- Meta información --}}
                            <div class="flex gap-2.5 flex-wrap text-sm text-gray-600 mb-3">
                                @if(isset($class->duration))
                                    <span class="bg-gray-100 rounded-full px-2.5 py-1.5">
                                        {{ $class->duration }} min
                                    </span>
                                @endif
                                
                                @if(isset($class->max_capacity))
                                    <span class="bg-gray-100 rounded-full px-2.5 py-1.5">
                                        Aforo {{ $class->max_capacity }}
                                    </span>
                                @endif

                                @if(isset($class->capacity))
                                    <span class="bg-gray-100 rounded-full px-2.5 py-1.5">
                                        Aforo {{ $class->capacity }}
                                    </span>
                                @endif
                                
                                @if(isset($class->price))
                                    <span class="bg-gray-100 rounded-full px-2.5 py-1.5">
                                        {{ number_format($class->price, 2) }} &euro;
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="flex gap-2.5 items-center px-4 pb-4">
                            <a 
                                href="{{ route('sessions.index', ['class_id' => $class->id]) }}"
                                class="inline-block text-center rounded-[10px] px-3 py-2.5 font-semibold bg-[#0ea5e9] text-white hover:bg-[#0284c7] no-underline"
                            >
                                Ver sesiones
                            </a>
                            <a 
                                href="{{ route('classes.show', $class->id) }}"
                                class="inline-block text-center rounded-[10px] px-3 py-2.5 font-semibold bg-[#eef2f7] text-[#0f172a] hover:bg-[#e2e8f0] no-underline"
                            >
                                Detalles
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            {{-- Mensaje vacío --}}
            <div class="py-12 text-center text-gray-600 bg-white/70 rounded-2xl">
                No hay clases disponibles.
            </div>
        @endif
    </div>
@endsection