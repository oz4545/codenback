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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('contenido');
            $table->unsignedBigInteger('dificulty_id'); // Clave foránea que referencia la dificultad
            $table->unsignedBigInteger('usuario_id');
            $table->boolean('completado')->default(false);
            $table->integer('puntaje_completado')->default(0);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('dificulty_id')->references('id')->on('difficulties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('levels');
    }
};
