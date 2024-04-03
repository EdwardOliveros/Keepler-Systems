<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            'tipo_doc' => 'CC',
            'num_doc' => '125478546',
            'id_rol' => '1',
            'nombre' => 'Rodrigo',
            'apellido' => 'Serna',
            'correo' => 'Rod1988@gmail.com',
            'contraseña' => Hash::make('RS2024-Adso'),
            'telefono' => '3114528975',
            'estado' => 'Activo',
            ],
        ];
        DB::table('usuario')->insert($data);
    }
}
