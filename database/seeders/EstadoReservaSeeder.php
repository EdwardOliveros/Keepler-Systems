<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'nombre' => 'Aprobada',
            'descripcion' => 'Reserva Aprobada',
            ],

            [
            'nombre' => 'En proceso',
            'descripcion' => 'Reserva en proceso',
            ],

            [
            'nombre' => 'Pendiente de pago',
            'descripcion' => 'Reserva con pago pendiente',
            ],

            [
            'nombre' => 'Concluido',
            'descripcion' => 'Reserva Concluida',
            ],

            [
            'nombre' => 'Cancelada',
            'descripcion' => 'Reserva Cancelada',
            ],

            [
            'nombre' => 'No Show',
            'descripcion' => 'No se presenta, no Cancela',
            ],

        ];
        DB::table('estado_reserva')->insert($data); 
    }
}
