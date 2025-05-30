<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div
            class="max-w-6xl mx-auto grid gap-6
                   sm:px-6 lg:px-8
                   md:grid-cols-2 lg:grid-cols-3">

            {{-- Cargos --}}
            @canany(['cargo.create','cargo.read','cargo.update','cargo.delete'])
                <x-dashboard-tile title="Cargos" route="{{ route('cargo.index') }}"/>
            @endcanany

            {{-- Personal --}}
            @canany(['personal.create','personal.read','personal.update','personal.delete'])
                <x-dashboard-tile title="Personal" route="{{ route('personal.index') }}"/>
            @endcanany

            {{-- Causa de muerte --}}
            @canany(['causamuerte.create','causamuerte.read','causamuerte.update','causamuerte.delete'])
                <x-dashboard-tile title="Causas de Muerte" route="{{ route('causamuerte.index') }}"/>
            @endcanany

            {{-- Salas --}}
            @canany(['sala.create','sala.read','sala.update','sala.delete'])
                <x-dashboard-tile title="Salas" route="{{ route('sala.index') }}"/>
            @endcanany

            {{-- Casos / Expedientes (fallecido) --}}
            @canany(['fallecido.create','fallecido.read','fallecido.update','fallecido.delete'])
                <x-dashboard-tile title="Casos / Expedientes" route="{{ route('fallecido.index') }}"/>
            @endcanany

            {{-- Autopsias --}}
            @canany(['autopsia.create','autopsia.read','autopsia.update','autopsia.delete'])
                <x-dashboard-tile title="Autopsias" route="{{ route('autopsia.index') }}"/>
            @endcanany

            {{-- Dictámenes --}}
            @canany(['informe.create','informe.read','informe.update','informe.delete'])
                <x-dashboard-tile title="Dictámenes" route="{{ route('informe.index') }}"/>
            @endcanany

            {{-- Evidencias --}}
            @canany(['evidencia.create','evidencia.read','evidencia.update','evidencia.delete'])
                <x-dashboard-tile title="Evidencias" route="{{ route('evidencia.index') }}"/>
            @endcanany

            {{-- Familiares --}}
            @canany(['familiar.create','familiar.read','familiar.update','familiar.delete'])
                <x-dashboard-tile title="Familiares" route="{{ route('familiar.index') }}"/>
            @endcanany

            {{-- Traslados --}}
            @canany(['traslado.create','traslado.read','traslado.update','traslado.delete'])
                <x-dashboard-tile title="Traslados" route="{{ route('traslado.index') }}"/>
            @endcanany

            {{-- Tóxico detectado --}}
            @canany(['toxico_detectado.create','toxico_detectado.read','toxico_detectado.update','toxico_detectado.delete'])
                <x-dashboard-tile title="Tóxicos Detectados" route="{{ route('toxico_detectado.index') }}"/>
            @endcanany

            {{-- Cadena de custodia --}}
            @canany(['cadena_custodia.create','cadena_custodia.read','cadena_custodia.update','cadena_custodia.delete'])
                <x-dashboard-tile title="Cadena de Custodia" route="{{ route('cadena_custodia.index') }}"/>
            @endcanany
        </div>
    </div>
</x-app-layout>
