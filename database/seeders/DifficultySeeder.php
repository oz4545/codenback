<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Difficulty;
use App\Models\User;

class DifficultySeeder extends Seeder
{
    public function run()
    {
        // Asumiendo que tienes un usuario con id 1
        $usuarioId = User::first()->id;

        Difficulty::create([
            'nombre' => 'Principiante',
            'completado' => false,
            'puntaje_completado' => 0,
            'usuario_id' => $usuarioId,
        ]);

        Difficulty::create([
            'nombre' => 'Aprendiz',
            'completado' => false,
            'puntaje_completado' => 0,
            'usuario_id' => $usuarioId,
        ]);

        Difficulty::create([
            'nombre' => 'Intermedio',
            'completado' => false,
            'puntaje_completado' => 0,
            'usuario_id' => $usuarioId,
        ]);
    }
}
