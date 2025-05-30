<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Personal
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a href="{{ route('personal.create') }}" class="btn btn-primary mb-3">
                        Nuevo Personal
                    </a>

                    {{-- flash messages --}}
                    <x-alert type="success"/>
                    <x-alert type="danger"/>

                    {{-- reusable table --}}
                    <x-datatable :headers="['Nombre','Especialidad','Contacto','Cargo']">
                        @forelse ($personals as $personal)
                            <tr>
                                <td class="px-4 py-2">{{ $personal->nombre }}</td>
                                <td class="px-4 py-2">{{ $personal->especialidad }}</td>
                                <td class="px-4 py-2">{{ $personal->contacto }}</td>
                                <td class="px-4 py-2">{{ $personal->id_cargo }}</td>

                                <td class="px-4 py-2 text-right space-x-2">
                                    <x-edit-btn   :href="route('personal.edit',   $personal)" />
                                    <x-delete-btn :action="route('personal.destroy',$personal)" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 italic text-center">
                                    No hay registros.
                                </td>
                            </tr>
                        @endforelse
                    </x-datatable>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
