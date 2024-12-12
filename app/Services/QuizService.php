<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Support\Facades\Session;

class QuizService
{
    public function initializeQuiz()
    {
        $this->resetQuiz();

        if (!Session::has('questions')) {
            $questions = Question::with('answers')
                ->inRandomOrder()
                ->limit(10)
                ->get();

            Session::put('questions', $questions);
            Session::put('current_question_index', 0);
        }

        return $this->getCurrentQuestion();
    }

    public function getCurrentQuestion()
    {
        $questions = Session::get('questions', []);
        $currentIndex = Session::get('current_question_index', 0);

        return $currentIndex < count($questions)
            ? $questions[$currentIndex]
            : null;
    }

    public function processAnswer($questionId, $answerId)
    {
        $questions = Session::get('questions', []);
        $currentIndex = Session::get('current_question_index', 0);

        if ($currentIndex >= count($questions)) {
            return [
                'result' => 'Quiz Finalizado!',
                'next_question' => null,
            ];
        }

        $question = $questions[$currentIndex];
        $correctAnswer = $question->answers()->where('is_correct', 1)->first();

        $isCorrect = $answerId == $correctAnswer->id;
        Session::put('result', $isCorrect ? 'Correto!' : 'Errado!');

        $nextQuestionIndex = $currentIndex + 1;
        Session::put('current_question_index', $nextQuestionIndex);

        return [
            'result' => Session::get('result'),
            'next_question' => $nextQuestionIndex < count($questions)
                ? $questions[$nextQuestionIndex]
                : null,
        ];
    }

    public function resetQuiz()
    {
        Session::forget('questions');
        Session::forget('current_question_index');
        Session::forget('result');
    }
}
