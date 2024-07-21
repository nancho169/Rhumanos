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
        Schema::create('fichadas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_usuario');
            $table->string('nombre',50);
            $table->timestamp('fichada')->nullable();
            $table->string('entrada');
            $table->string('salida');
            $table->string('descripcion');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichadas');
    }
};
