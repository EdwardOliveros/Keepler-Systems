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
        Schema::create('tarifa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo_habitacion')->constrained('tipo_habitacion');
            $table->enum('temporada', ['Alta','Baja','Festivos']);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('tarifa_diaria', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifa');
    }
};
