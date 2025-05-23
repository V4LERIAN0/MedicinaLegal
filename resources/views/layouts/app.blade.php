<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MedicinaLegal') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')   {{-- por si luego quieres inyectar CSS --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MedicinaLegal</a>

        </div>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
        Módulos
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('cargo.index') }}">Cargo</a></li>
        <li><a class="dropdown-item" href="{{ route('personal.index') }}">Personal</a></li>
        <li><a class="dropdown-item" href="{{ route('causamuerte.index') }}">Causa de Muerte</a></li>
        <li><a class="dropdown-item" href="{{ route('sala.index') }}">Sala</a></li>
        <li><a class="dropdown-item" href="{{ route('fallecido.index') }}">Fallecido</a></li>
        <li><a class="dropdown-item" href="{{ route('autopsia.index') }}">Autopsia</a></li>
        <li><a class="dropdown-item" href="{{ route('informe.index') }}">Informe</a></li>
        <li><a class="dropdown-item" href="{{ route('evidencia.index') }}">Evidencia</a></li>
        <li><a class="dropdown-item" href="{{ route('cadenacustodia.index') }}">Cadena de Custodia</a></li>
        <li><a class="dropdown-item" href="{{ route('familiar.index') }}">Familiar</a></li>
        <li><a class="dropdown-item" href="{{ route('traslado.index') }}">Traslado</a></li>
        <li><a class="dropdown-item" href="{{ route('registrofotografico.index') }}">Registro Fotográfico</a></li>
        <li><a class="dropdown-item" href="{{ route('toxicodetectado.index') }}">Tóxico Detectado</a></li>
        <li><a class="dropdown-item" href="{{ route('usuariosistema.index') }}">Usuario Sistema</a></li>
    </ul>
</li>

        
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
