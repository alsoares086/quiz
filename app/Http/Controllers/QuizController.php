<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        session()->forget('result');

        if (!session()->has('questions')) {
            $questions = Question::with('answers')
                ->inRandomOrder()
                ->limit(10)
                ->get();

            session(['questions' => $questions]);
            session(['current_question_index' => 0]);
        }

        $questions = session('questions');
        $currentIndex = session('current_question_index', 0);

        if ($currentIndex >= $questions->count()) {
            return view('quiz.finished');
        }

        $currentQuestion = $questions[$currentIndex];

        return view('quiz.index', ['question' => $currentQuestion]);
    }

    public function answer(Request $request)
    {
        $request->validate([
            'answer' => 'required|exists:answers,id',
            'question_id' => 'required|exists:questions,id'
        ]);
    
        $questions = session('questions', []);
        $currentIndex = session('current_question_index', 0);
    
        // Verificar se o índice atual está dentro dos limites
        if ($currentIndex >= count($questions)) {
            return response()->json([
                'result' => 'Quiz Finalizado!',
                'next_question' => null,
            ]);
        }
    
        $question = $questions[$currentIndex];
        $correctAnswer = $question->answers()->where('is_correct', true)->first();
    
        // Verificar se a resposta está correta
        $isCorrect = $request->answer == $correctAnswer->id;
        session()->put('result', $isCorrect ? 'Correto!' : 'Errado!');
    
        // Incrementar o índice da pergunta atual
        $nextQuestionIndex = $currentIndex + 1;
        session(['current_question_index' => $nextQuestionIndex]);
    
        if ($nextQuestionIndex >= count($questions)) {
            return response()->json([
                'result' => session('result'),
                'next_question' => null,
            ]);
        }
    
        // Próxima pergunta
        $nextQuestion = $questions[$nextQuestionIndex];
        $nextQuestionHtml = view('quiz.partials.question', ['question' => $nextQuestion])->render();
    
        return response()->json([
            'result' => session('result'),
            'next_question' => $nextQuestionHtml,
        ]);
    }
}
