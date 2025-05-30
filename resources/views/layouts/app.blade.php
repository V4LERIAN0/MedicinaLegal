<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 text-base-content">

<header class="navbar bg-base-300 shadow">
    <div class="flex-1">
        <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">
            <img src="{{ asset('img/logo.svg') }}" class="h-7 mr-2" alt="logo">
            Medicina Legal
        </a>
    </div>

    {{-- Right-side menu --}}
    <div class="flex-none">
        <x-button color="ghost" class="mr-2" href="#">Ayuda</x-button>

        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost">
                {{ Auth::user()->name }}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-40">
                <li><a href="#">Perfil</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button type="submit">Salir</button>
                    </form>
                </li>
            </ul>
        </div>
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
