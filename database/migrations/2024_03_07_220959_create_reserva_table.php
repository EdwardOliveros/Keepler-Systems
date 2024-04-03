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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_habitacion')->constrained('habitacion');
            $table->foreignId('id_usuario')->constrained('usuario');
            $table->timestamp('fecha_emision');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->integer('cantidad_adultos')->nullable();
            $table->integer('cantidad_niños')->nullable();
            $table->decimal('costo', 10, 2);
            $table->foreignId('id_tarifa')->constrained('tarifa');
            $table->text('peticion_especial')->nullable();;
            $table->foreignId('id_metodo_pago')->constrained('metodo_pago');
            $table->foreignId('id_estado_reserva')->constrained('estado_reserva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
