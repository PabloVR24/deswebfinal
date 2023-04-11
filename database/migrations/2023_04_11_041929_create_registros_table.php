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
        Schema::create('registros', function (Blueprint $table) {
            $table->id('id_registro');
            $table->date('fecha_contrato');
            $table->date('fecha_instalacion');

            $table->bigInteger('id_servicio')->unsigned();
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');

            $table->bigInteger('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
