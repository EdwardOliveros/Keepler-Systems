<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Administra Todo el Sistema.',
            ],

            [
                'nombre' => 'Cliente',
                'descripcion' => 'Visualiza algunos modulos.',
            ],

            [
                'nombre' => 'Empleado',
                'descripcion' => 'Dominio de algunos modulos.',
            ],
        ];
        DB::table('rol')->insert($data);
    }
}
