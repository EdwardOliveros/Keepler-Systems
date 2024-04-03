<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre' => 'Piscina',
                'descripcion' => 'Piscina',
                'costo' => '25',
                'estado' => 'Activo',
            ],

            [
                'nombre' => 'Resturante',
                'descripcion' => 'Resturante',
                'costo' => '35',
                'estado' => 'Activo',
            ],

            [
                'nombre' => 'Bar',
                'descripcion' => 'Bar',
                'costo' => '40',
                'estado' => 'Activo',
            ],

            [
                'nombre' => 'Spa',
                'descripcion' => 'Spa',
                'costo' => '30',
                'estado' => 'Activo',
            ],
        ];
        DB::table('servicio')->insert($data);
    }
}
