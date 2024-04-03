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
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_emision')->default(now());
            $table->foreignId('id_reserva')->constrained('reserva');
            $table->decimal('monto_total');
            $table->foreignId('id_tarifa')->constrained('tarifa');
            $table->enum('estado_pago', ['pendiente', 'pagada', 'Parcialmente Pagada', 'Vencida', 'Cancelada']);
            $table->foreignId('id_metodo_pago')->constrained('metodo_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
