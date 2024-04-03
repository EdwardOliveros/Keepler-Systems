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
        Schema::create('reserva_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_reserva')->constrained('reserva');
            $table->foreignId('id_servicio')->constrained('servicio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_servicio');
    }
};
