<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habitacion', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->integer('piso');
            $table->string('descripcion');
            $table->foreignId('id_tipo_habitacion')->constrained('tipo_habitacion');
            $table->decimal('costo_base', 10, 2);
            $table->enum('estado', ['Disponible', 'Reservada', 'Ocupada', 'En Mantenimiento']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion');
    }
};
