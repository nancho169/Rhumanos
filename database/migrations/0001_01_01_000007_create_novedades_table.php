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
        Schema::create('novedades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descripcion',50);
            $table->integer('cantidad');
            $table->timestamp('fecha_creacion')->nullable();
            /* Inlcuye el id de persona*/
            $table->unsignedBigInteger('personas_id');
            $table->foreign('personas_id')->references('id')->on('personas')->onDelete('cascade');
            /* Inlcuye el id de justificaciones*/
            $table->unsignedBigInteger('justificaciones_id');
            $table->foreign('justificaciones_id')->references('id')->on('justificaciones')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
