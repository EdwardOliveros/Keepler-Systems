<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_tipo_habitacion' => '1',
                'temporada' => 'Baja',
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2024-06-30',
                'tarifa_diaria' => '120',
            ],

            [
                'id_tipo_habitacion' => '1',
                'temporada' => 'Alta',
                'fecha_inicio' => '2024-07-01',
                'fecha_fin' => '2024-12-30',
                'tarifa_diaria' => '150',
            ],

            [
                'id_tipo_habitacion' => '2',
                'temporada' => 'Baja',
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2024-06-30',
                'tarifa_diaria' => '220',
            ],

            [
                'id_tipo_habitacion' => '2',
                'temporada' => 'Alta',
                'fecha_inicio' => '2024-07-01',
                'fecha_fin' => '2024-12-30',
                'tarifa_diaria' => '250',
            ],

            [
                'id_tipo_habitacion' => '3',
                'temporada' => 'Baja',
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2024-06-30',
                'tarifa_diaria' => '320',
            ],

            [
                'id_tipo_habitacion' => '3',
                'temporada' => 'Alta',
                'fecha_inicio' => '2024-07-01',
                'fecha_fin' => '2024-12-30',
                'tarifa_diaria' => '350',
            ],

            [
                'id_tipo_habitacion' => '4',
                'temporada' => 'Baja',
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2024-06-30',
                'tarifa_diaria' => '420',
            ],

            [
                'id_tipo_habitacion' => '4',
                'temporada' => 'Alta',
                'fecha_inicio' => '2024-07-01',
                'fecha_fin' => '2024-12-30',
                'tarifa_diaria' => '450',
            ],

            
        ];
        DB::table('tarifa')->insert($data);
    }
}
