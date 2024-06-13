<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    public function showQuestion($formId, $questionId)
    {
        $form = Form::findOrFail($formId);
        $question = Question::where('formulario', $formId)->findOrFail($questionId);
        $answers = Answer::where('pregunta_id', $question->id)->get();

        return view('quiz.question', compact('form', 'question', 'answers'));
    }

    public function validateAnswer(Request $request, $formId, $questionId)
    {
        $question = Question::where('formulario', $formId)->findOrFail($questionId);
        $correctAnswers = Answer::where('pregunta_id', $question->id)->where('respuesta', true)->pluck('id')->toArray();

        if ($question->type == 'unica_respuesta') {
            if (in_array($request->input('answer'), $correctAnswers)) {
                $question->completado = true;
                $question->save();
                return $this->nextQuestionOrCompleted($formId, $questionId);
            } else {
                return back()->with('error', 'Respuesta incorrecta. Inténtalo de nuevo.');
            }
        }
    }

    public function nextQuestionOrCompleted($formId, $currentQuestionId)
    {
        $nextQuestion = Question::where('formulario', $formId)
            ->where('id', '>', $currentQuestionId)
            ->orderBy('id')
            ->first();

        if ($nextQuestion) {
            return redirect()->route('quiz.show', ['formId' => $formId, 'questionId' => $nextQuestion->id]);
        } else {
            $form = Form::findOrFail($formId);
            $form->completado = true;
            $form->save();

            return redirect()->route('quiz.completed', ['formId' => $formId]);
        }
    }

    public function completed($formId)
    {
        $form = Form::findOrFail($formId);
        return view('quiz.completed', compact('form'));
    }
}
