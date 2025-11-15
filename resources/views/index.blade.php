@extends('layouts.app')

@section('contenido')
    <div class="container">
        <header>
            <div class="logo">MikeFit</div>

            {{-- Buscador simple --}}
            <form class="search" method="GET" action="{{ url()->current() }}">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar clase (yoga, spinning, etc.)" />
                <button class="btn btn-secondary" type="submit">Buscar</button>
            </form>
        </header>

        @if(isset($classes) && count($classes))
            <div class="grid">
                @foreach($classes as $class)
                    <article class="card">
                        {{-- Imagen --}}
                        @if(!empty($class->image))
                            <img class="thumb" src="{{ asset($class->image) }}" alt="Imagen de {{ $class->name }}" />
                        @else
                            <div class="thumb" aria-hidden="true"></div>
                        @endif

                        <div class="content">
                            <h2 class="title">{{ $class->name }}</h2>
                            <p class="desc">{{ $class->description ?? 'Clase del gimnasio para todos los niveles.' }}</p>
                            <div class="meta">
                                @if(isset($class->duration)) <span class="pill">{{ $class->duration }} min</span>@endif
                                @if(isset($class->max_capacity)) <span class="pill">Aforo {{ $class->max_capacity }}</span>@endif
                                @if(isset($class->price)) <span class="pill">{{ number_format($class->price, 2) }} &euro;</span>@endif
                            </div>
                        </div>

                        <div class="actions">
                            <a class="btn btn-primary" href="{{ route('sessions.index', ['class_id' => $class->id]) }}">
                                Ver sesiones
                            </a>
                            <a class="btn btn-secondary" href="{{ route('classes.show', $class->id) }}">Detalles</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty">
                No hay clases disponibles.
            </div>
        @endif
    </div>
@endsection