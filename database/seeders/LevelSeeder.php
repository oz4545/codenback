<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\User;
use App\Models\Difficulty;

class LevelSeeder extends Seeder
{
    public function run()
    {
        $usuarioId = User::first()->id;
        $dificultyId = Difficulty::first()->id;

        Level::firstOrCreate(
            ['id' => 1],
            [
                'nombre' => 'Nivel 1',
                'contenido' => 'Contenido del primer nivel',
                'dificulty_id' => $dificultyId,
                'usuario_id' => $usuarioId,
                'completado' => false,
                'puntaje_completado' => 0,
            ]
        );
    }
}
