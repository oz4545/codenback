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
        Schema::create('difficulties', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Principiante, Aprendiz, Intermedio
            $table->boolean('completado')->default(false);
            $table->integer('puntaje_completado')->default(0);
            $table->unsignedBigInteger('usuario_id'); // Cambiado el nombre a usuario_id
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users'); // Definimos la clave foránea correctamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('difficulties');
    }
};
