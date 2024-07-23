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
        Schema::create('justificaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descripcion',50);
            $table->string('color');
            $table->string('unidad',50);
            $table->string('sigla',50);
            $table->integer('cantidad');
            $table->boolean('descuento');
            $table->string('referencia');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->integer('minutos');
            $table->integer('hora');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justificaciones');
    }
};
