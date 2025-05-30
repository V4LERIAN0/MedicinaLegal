<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name', 'Medicina Legal') }}</title>

    {{-- Vite (Tailwind + DaisyUI) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-base-200 text-base-content">

    {{-- ─────────────────────────  NAVBAR  ───────────────────────── --}}
    <nav class="navbar bg-base-300 shadow">
        {{-- LEFT: Logo + Brand --}}
        <div class="navbar-start">
            <a href="{{ route('dashboard') }}" class="btn btn-ghost text-lg normal-case">
                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                     class="w-8 h-8 object-contain mr-2">
                Medicina Legal
            </a>
        </div>

        {{-- CENTER (de momento vacío) --}}
        <div class="navbar-center"></div>

        {{-- RIGHT: User menu (solo si está autenticado) --}}
        @auth
            <div class="navbar-end">
                <details class="dropdown dropdown-end">
                    <summary class="btn btn-ghost">
                        {{ Auth::user()->username ?? Auth::user()->name }}
                        <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
                    </summary>

                    <ul tabindex="0"
                        class="menu dropdown-content p-2 shadow bg-base-100 rounded-box w-48">
                        <li>
                            <a href="{{ route('profile.edit') }}">
                                <x-heroicon-o-user class="w-4 h-4"/> Perfil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button>
                                    <heroicon-o-arrow-left-on-rectangle class="w-4 h-4"/> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </details>
            </div>
        @endauth
    </nav>
    {{-- ──────────────────────────────────────────────────────────── --}}

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="container mx-auto p-8">
        {{-- Flash banners (éxito / error) --}}
        <x-flash type="success"/>
        <x-flash type="error"/>

        {{ $slot }}
    </main>

</body>
</html>
