<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /** Tabla => CRUD actions that exist */
    private array $tables = [
        'cargo',
        'personal',
        'causamuerte',
        'sala',
        'fallecido',
        'autopsia',
        'informe',
        'evidencia',
        'familiar',
        'traslado',
        'registro_fotografico',
        'toxico_detectado',
        'cadena_custodia',
        'usuario_sistema',           // módulo de admin
    ];

    /** Matrix extracted from the Excel  */
    private array $matrix = [
        'secretaria' => [
            // create  read  update  delete
            'fallecido'            => 'CRU-',
            'personal'             => '-RU-',
            'evidencia'            => 'CR--',
            'cargo'                => '-R--',
            'causamuerte'          => '-R--',
            'sala'                 => '-R--',
            'autopsia'             => '-R--',
            'informe'              => '-R--',
            'familiar'             => '-R--',
            'traslado'             => '-R--',
            'registro_fotografico' => '-R--',
            'toxico_detectado'     => '-R--',
            'cadena_custodia'      => '-R--',
        ],

        'medico-forense' => [
            'evidencia'            => 'CR--',
            'fallecido'            => '-R--',
            'personal'             => '-R--',
        ],

        'coordinador' => [
            'fallecido'            => '-RU-',
            'informe'              => '-RU-',
            'personal'             => '-R--',
        ],

        'perito' => [
            'evidencia'            => 'CR--',
            'fallecido'            => '-R--',
            'informe'              => 'C---',   // borrador
        ],

        'admin-sistema' => [ '*' => 'CRUD' ],   // todos
    ];

    public function run(): void
    {
        /* -------------------------------------------------
         | 1)  Create every permission once
         * ------------------------------------------------*/
        foreach ($this->tables as $tbl) {
            foreach (['create','read','update','delete'] as $act) {
                Permission::firstOrCreate(['name' => "$tbl.$act"]);
            }
        }

        /* -------------------------------------------------
         | 2)  Create / sync roles from the matrix
         * ------------------------------------------------*/
        foreach ($this->matrix as $roleSlug => $rules) {
            $role = Role::firstOrCreate(['name' => $roleSlug]);

            // wildcard * = all permissions
            if (isset($rules['*'])) {
                $role->syncPermissions(Permission::all());
                continue;
            }

            $permList = [];
            foreach ($rules as $tbl => $crud) {
                $crud   = str_pad($crud, 4, '-');   // ensure length 4
                $map    = ['C'=>'create','R'=>'read','U'=>'update','D'=>'delete'];
                foreach (str_split($crud) as $i => $flag) {
                    if ($flag !== '-' && isset($map[$flag])) {
                        $permList[] = "$tbl.".$map[$flag];
                    }
                }
            }
            $role->syncPermissions($permList);
        }

        // flush cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
