<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'nombre' => 'Efectivo',
            'descripcion' => 'Dinero en Efectivo',
            ],

            [
            'nombre' => 'Tarjeta',
            'descripcion' => 'Tarjeta',
            ],
        ];
        DB::table('metodo_pago')->insert($data);
    }
}
