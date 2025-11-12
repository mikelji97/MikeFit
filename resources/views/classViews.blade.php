{{-- resources/views/classes/index.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MikeFit · Clases</title>

    <style>
        :root {
            --bg: #d6e7e0;
            --card: #ffffff;
            --muted: #6b7280;
            --text: #111827;
            --brand: #0ea5e9;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto;
            background: var(--bg);
            color: var(--text);
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px
        }

        .logo {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: .5px
        }

        .search {
            display: flex;
            gap: 8px;
            flex-wrap: wrap
        }

        .search input {
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            min-width: 240px
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 20px
        }

        @media(min-width:640px) {
            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(min-width:1024px) {
            .grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .card {
            background: var(--card);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 24px rgba(0, 0, 0, .06);
            display: flex;
            flex-direction: column
        }

        .thumb {
            aspect-ratio: 4/3;
            background: #d5c7c7;
            display: block;
            width: 100%;
            object-fit: cover
        }

        .content {
            padding: 16px 16px 8px
        }

        .title {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 6px
        }

        .desc {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.45;
            margin: 0 0 10px;
            min-height: 2.9em
        }

        .meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 12px
        }

        .pill {
            background: #f3f4f6;
            border-radius: 999px;
            padding: 6px 10px
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
            padding: 0 16px 16px
        }

        .btn {
            appearance: none;
            border: 0;
            border-radius: 10px;
            padding: 10px 12px;
            font-weight: 600;
            cursor: pointer
        }

        .btn-primary {
            background: var(--brand);
            color: white
        }

        .btn-secondary {
            background: #eef2f7;
            color: #0f172a
        }

        .empty {
            padding: 48px;
            text-align: center;
            color: var(--muted);
            background: #ffffffAA;
            border-radius: 16px
        }

        .pagination {
            margin-top: 24px;
            display: flex;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border-radius: 10px;
            background: #fff;
            border: 1px solid #e5e7eb;
            text-decoration: none;
            color: #111827
        }

        .pagination .active {
            background: var(--brand);
            color: #fff;
            border-color: transparent
        }
    </style>
</head>

<body>
    <div class="container">

        <header>
            <div class="logo">MikeFit</div>

            {{-- Buscador simple opcional (envía ?q=…) --}}
            <form class="search" method="GET" action="{{ url()->current() }}">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar clase (yoga, spinning…)" />
                <button class="btn btn-secondary" type="submit">Buscar</button>
            </form>
        </header>

        @if(isset($classes) && count($classes))
        <div class="grid">
            @foreach($classes as $class)
            <article class="card">
                {{-- Imagen: usa $class->image si existe; si no, bloque de color --}}
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
                        @if(isset($class->price)) <span class="pill">{{ number_format($class->price, 2) }} €</span>@endif
                        @if(isset($class->is_active) && !$class->is_active) <span class="pill">Inactiva</span>@endif
                    </div>
                </div>

                <div class="actions">
                    {{-- Ver sesiones de este tipo de clase (puedes crear un filtro por querystring) --}}
                    <a class="btn btn-primary"
                        href="{{ route('sessions.index', ['class_id' => $class->id]) }}">
                        Ver sesiones / Reservar
                    </a>

                    {{-- Detalle opcional del tipo de clase --}}
                    <a class="btn btn-secondary" href="{{ route('classes.show', $class->id) }}">Detalles</a>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Paginación si llega un LengthAwarePaginator --}}
        @if(method_exists($classes, 'links'))
        <div class="pagination">
            {{-- Render básico sin Tailwind --}}
            @php $links = $classes->onEachSide(1)->links()->render(); @endphp
            {!! str_replace(['class="pagination"'], ['class="pagination"'], $links) !!}
        </div>
        @endif

        @else
        <div class="empty">
            Aún no hay clases disponibles. Crea la primera desde
            <a href="{{ route('classes.create') }}">aquí</a>.
        </div>
        @endif
    </div>
</body>

</html>