<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            1 => [
                ['nombre' => '</html>', 'respuesta' => false],
                ['nombre' => '<style>', 'respuesta' => false],
                ['nombre' => '<html>', 'respuesta' => true],
                ['nombre' => '<p>', 'respuesta' => false],
            ],
            2 => [
                ['nombre' => '<html>', 'respuesta' => false],
                ['nombre' => '<body>', 'respuesta' => false],
                ['nombre' => '</html>', 'respuesta' => true],
                ['nombre' => '</body>', 'respuesta' => false],
            ],
            3 => [
                ['nombre' => '<div>', 'respuesta' => false],
                ['nombre' => '<span>', 'respuesta' => false],
                ['nombre' => '<p>', 'respuesta' => true],
                ['nombre' => '<section>', 'respuesta' => false],
            ],
            4 => [
                ['nombre' => '<link>', 'respuesta' => false],
                ['nombre' => '<a>', 'respuesta' => true],
                ['nombre' => '<href>', 'respuesta' => false],
                ['nombre' => '<ul>', 'respuesta' => false],
            ],
            5 => [
                ['nombre' => '<img>', 'respuesta' => true],
                ['nombre' => '<picture>', 'respuesta' => false],
                ['nombre' => '<image>', 'respuesta' => false],
                ['nombre' => '<src>', 'respuesta' => false],
            ],
            6 => [
                ['nombre' => '<table>', 'respuesta' => true],
                ['nombre' => '<tab>', 'respuesta' => false],
                ['nombre' => '<tr>', 'respuesta' => false],
                ['nombre' => '<td>', 'respuesta' => false],
            ],
        ];

        foreach ($answers as $questionId => $answerSet) {
            $question = Question::find($questionId);

            if ($question) {
                foreach ($answerSet as $answer) {
                    Answer::firstOrCreate(array_merge($answer, ['pregunta_id' => $question->id]));
                }
            }
        }
    }
}
