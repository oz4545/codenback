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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // Clave foránea que referencia al usuario
            $table->integer('dificultades_completadas');
            $table->integer('areas_completadas');
            $table->unsignedBigInteger('puntaje_total'); // Clave foránea que referencia al puntaje
            $table->unsignedBigInteger('nivel_completado'); // Clave foránea que referencia al nivel completado
            $table->unsignedBigInteger('dificultad_completada'); // Clave foránea que referencia a la dificultad completada
            $table->integer('posicion_global');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('nivel_completado')->references('id')->on('levels');
            $table->foreign('dificultad_completada')->references('id')->on('difficulties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};


