<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Form;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Busca el formulario creado por FormSeeder
        $form1 = Form::find(1);

        if ($form1) {
            $questions = [
                [
                    'id' => 1,
                    'nombre_pregunta' => '¿Cuál de estas etiquetas es la que encabeza una página web?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
                [
                    'id' => 2,
                    'nombre_pregunta' => '¿Cuál es la etiqueta de cierre de HTML?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
                [
                    'id' => 3,
                    'nombre_pregunta' => '¿Cuál es la etiqueta para párrafos en HTML?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
                [
                    'id' => 4,
                    'nombre_pregunta' => '¿Qué etiqueta se utiliza para crear un enlace en HTML?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
                [
                    'id' => 5,
                    'nombre_pregunta' => '¿Qué etiqueta se utiliza para insertar una imagen en HTML?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
                [
                    'id' => 6,
                    'nombre_pregunta' => '¿Cuál de estas etiquetas se usa para definir una tabla en HTML?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ],
            ];

            foreach ($questions as $question) {
                Question::firstOrCreate(['id' => $question['id']], $question + ['formulario' => $form1->id]);
            }
        }
    }
}
