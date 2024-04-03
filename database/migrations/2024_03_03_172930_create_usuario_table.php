<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_doc', ['CC', 'TI', 'CE']);
            $table->string('num_doc');
            $table->foreignId('id_rol')->constrained('rol');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->string('contraseña');
            $table->enum('cargo', ['Gerente', 'Recepcionista'])->nullable();
            $table->decimal('ingreso_basico', 10, 2)->nullable();
            $table->string('telefono');
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();


        }); 

        DB::statement('ALTER TABLE usuario AUTO_INCREMENT = 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
