<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 text-base-content">

<header class="navbar bg-base-300 shadow">
    {{--  LEFT  ---------------------------------------------------------}}
    <div class="navbar-start">
        <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">
            <img src="{{ asset('img/logo.svg') }}" class="h-7 mr-2" alt="logo">
            Medicina Legal
        </a>
    </div>

    {{--  CENTER  (empty – remove if you want)  -------------------------}}
    <div class="navbar-center"></div>

    {{--  RIGHT  --------------------------------------------------------}}
    <div class="navbar-end gap-2">
        <x-button color="ghost" href="#">Ayuda</x-button>

        <details class="dropdown">
            <summary class="btn btn-ghost">{{ Auth::user()->name }}</summary>
            <ul class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-48">
                <li><a>Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf <button>Salir</button>
                    </form>
                </li>
            </ul>
        </details>
    </div>
</header>

<main class="container mx-auto p-8">
    {{-- Flash banners --}}
    <x-flash type="success"/>
    <x-flash type="error"/>

    {{ $slot }}
</main>

</body>
</html>
