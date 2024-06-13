<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Form;
use App\Models\User;
use App\Models\Level;

class FormSeeder extends Seeder
{
    public function run()
    {
        $usuarioId = User::first()->id;
        $levelId = Level::first()->id;

        Form::firstOrCreate(
            ['id' => 1],
            [
                'nombre' => 'Formulario 1',
                'nivel' => $levelId,
                'descripcion' => 'Introduccion a HTML',
                'completado' => false,
                'usuario_id' => $usuarioId,
            ]
        );
    }
}
