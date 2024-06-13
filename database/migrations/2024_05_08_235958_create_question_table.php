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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formulario');
            $table->string('nombre_pregunta');
            $table->string('descripcion');
            $table->enum('type', ['unica_respuesta', 'multiple_respuestas', 'texto'])->default('unica_respuesta');
            $table->boolean('completado')->default(false);
            $table->timestamps();

            $table->foreign('formulario')->references('id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
