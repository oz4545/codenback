<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserAnswers;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class UserAnswerSeeder extends Seeder
{
    public function run()
    {
        // Obtener el usuario
        $user = User::first();

        if ($user) {
            // Obtener todas las preguntas
            $questions = Question::all();

            foreach ($questions as $question) {
                // Buscar la respuesta correcta para esta pregunta
                $correctAnswer = Answer::where('pregunta_id', $question->id)->where('respuesta', true)->first();

                if ($correctAnswer) {
                    // Crear la entrada de la respuesta del usuario
                    UserAnswers::firstOrCreate([
                        'usuario_id' => $user->id,
                        'pregunta_id' => $question->id,
                        'respuesta_id' => $correctAnswer->id,
                    ]);
                }
            }
        }
    }
}
