<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Estandar',
                'descripcion' => 'Estandar',
                'capacidad_persona' => '2',
            ],

            [
                'nombre' => 'Doble',
                'descripcion' => 'Doble',
                'capacidad_persona' => '2',
            ],

            [
                'nombre' => 'Triple',
                'descripcion' => 'Triple',
                'capacidad_persona' => '2',
            ],

            [
                'nombre' => 'Suite',
                'descripcion' => 'Suite',
                'capacidad_persona' => '3',
            ],
        ];
        DB::table('tipo_habitacion')->insert($data);
    }
}
