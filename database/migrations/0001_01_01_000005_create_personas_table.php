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
            $table->bigInteger(column: 'legajo');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('apellido_nombre');
            $table->string('sexo');
            $table->integer('categoria');
            $table->integer('categoria_planta');
            $table->string('descripcion_categoria');
            $table->string('grupo');
            $table->integer('codigo');
            $table->string('email');
            $table->string('img');
            $table->boolean('activo');
            $table->BigInteger('cuil')->nullable();
            $table->BigInteger('dni')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->BigInteger('telefono');
            $table->string('direccion');
            $table->string('jefatura');
            $table->string('agrupacion');
            $table->string('partida');
            $table->string('funcion');
            $table->integer('item');
            $table->integer('sub_item');
            
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
