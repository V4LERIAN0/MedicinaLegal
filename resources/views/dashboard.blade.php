{{--  resources/views/dashboard.blade.php  --}}
<x-app-layout title="Dashboard">
    <h1 class="text-3xl font-semibold mb-8">Panel principal</h1>

    {{-- grid responsive: 1-col on phones, up to 4 on xl --}}
    <div class="grid gap-6
                grid-cols-1
                sm:grid-cols-2
                lg:grid-cols-3
                xl:grid-cols-4">

        @can('cargo.read')
            <x-dashboard.tile route="cargo.index" icon="heroicon-o-briefcase" label="Cargos"/>
        @endcan

        @can('personal.read')
            <x-dashboard.tile route="personal.index" icon="heroicon-o-users"    label="Personal"/>
        @endcan

        @can('causamuerte.read')
            <x-dashboard.tile route="causamuerte.index" icon="heroicon-o-eye-slash" label="Causas de Muerte"/>
        @endcan

        @can('sala.read')
            <x-dashboard.tile route="sala.index" icon="heroicon-o-building-office" label="Salas"/>
        @endcan

        {{-- -----  Cadáveres ----- --}}
        @can('fallecido.read')
            <x-dashboard.tile route="fallecido.index" icon="heroicon-o-identification" label="Fallecidos"/>
        @endcan

        @can('autopsia.read')
            <x-dashboard.tile route="autopsia.index" icon="heroicon-o-beaker" label="Autopsias"/>
        @endcan

        @can('informe.read')
            <x-dashboard.tile route="informe.index" icon="heroicon-o-document-text" label="Informes"/>
        @endcan

        {{-- -----  Evidencia & Custodia  ----- --}}
        @can('evidencia.read')
            <x-dashboard.tile route="evidencia.index" icon="heroicon-o-cube-transparent" label="Evidencias"/>
        @endcan

        @can('cadena_custodia.read')
            <x-dashboard.tile route="custodia.index" icon="heroicon-o-gift-top" label="Custodia"/>
        @endcan

        {{-- -----  Traslados / Tóxicos / Fotos  ----- --}}
        @can('traslado.read')
            <x-dashboard.tile route="traslado.index" icon="heroicon-o-arrow-path-rounded-square" label="Traslados"/>
        @endcan

        @can('toxico_detectado.read')
            <x-dashboard.tile route="toxico_detectado.index" icon="heroicon-o-exclamation-triangle" label="Tóxicos"/>
        @endcan

        {{-- -----  Usuarios ----- --}}
        @can('usuario.read')
            <x-dashboard.tile route="usuario.index" icon="heroicon-o-key" label="Usuarios"/>
        @endcan
    </div>
</x-app-layout>
