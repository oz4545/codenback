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
        Schema::create('achievementdifficulty', function (Blueprint $table) {
            $table->unsignedBigInteger('achievement_id');
            $table->unsignedBigInteger('dificulty_id');
            $table->timestamps();

            $table->foreign('dificulty_id')->references('id')->on('difficulties')->onDelete('cascade');
            $table->foreign('achievement_id')->references('id')->on('achievements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievementdifficulty');
    }
};
