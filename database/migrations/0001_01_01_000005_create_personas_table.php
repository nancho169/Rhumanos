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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('legajo');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('apellido_nombre');
            $table->integer('codigo');
            $table->string('email');
            $table->string('img');
            $table->boolean('activo');
            $table->BigInteger('cuil')->nullable();
            $table->BigInteger('dni')->nullable();
            $table->time('fecha_nacimiento')->nullable();
            $table->time('fecha_ingreso')->nullable();
            $table->BigInteger('telefono');
            $table->string('direccion');
            $table->string('cargo');
            $table->string('funcion');
            $table->rememberToken();
            $table->timestamps();
            /* Clave foranea de organigrama */
            $table->unsignedBigInteger('organigrama_id');
            $table->foreign('organigrama_id')->references('id')->on('organigramas')->onDelete('cascade');
            $table->string('tipo_empleado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
