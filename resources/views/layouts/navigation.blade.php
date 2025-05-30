<nav class="navbar bg-base-100 shadow mb-6">

{{-- DEBUG NAVBAR 123 --}}
    {{--  Brand / logo  --}}
    <div class="flex items-center gap-2">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="{{ asset('images/logo.svg') }}"  
                 class="h-8 w-8 object-contain" alt="Logo">
            <span class="ml-2 font-semibold text-lg">Medicinaaa Legal</span>
        </a>
    </div>

    <div class="flex-1"></div> {{--   spacer   --}}

    @auth
        {{--  User dropdown  --}}
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost">
                <span class="mr-2">{{ Auth::user()->username }}</span>
                <x-heroicon-o-chevron-down class="w-4 h-4"/>
            </label>

            <ul tabindex="0"
                class="menu dropdown-content bg-base-200 rounded-box w-40 mt-2 p-2 shadow">

                <li>
                    <a href="{{ route('profile.edit') }}">
                        <x-heroicon-o-user class="w-4 h-4"/> Perfil
                    </a>
                </li>

                <li>
                    {{-- Logout needs POST --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>
                            <x-heroicon-o-logout class="w-4 h-4"/> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</nav>
