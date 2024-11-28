<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    public function index()
    {
            session()->forget('questions');
            session()->forget('current_question_index');
            session()->forget('result');
   
        if (!session()->has('questions')) {
    
            $response = Http::get('https://opentdb.com/api.php', [
                'amount' => 10,    
                'category' => 18,
                'difficulty' => 'medium', 
                'type' => 'multiple', 
            ]);

          
            session(['questions' => collect($response->json()['results'])]);
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
        $correct = $request->answer == $request->correct_answer;
    
        session()->put('result', $correct ? 'Correto!' : 'Errado!');
    
        $nextQuestionIndex = session('current_question_index') + 1;
        session(['current_question_index' => $nextQuestionIndex]);
    
        $questions = session('questions');
    
        if ($nextQuestionIndex >= $questions->count()) {
            return response()->json([
                'result' => session('result'),
                'next_question' => null,
            ]);
        }
    
        $currentQuestion = $questions[$nextQuestionIndex];
    
        $questionHtml = view('quiz.partials.question', ['question' => $currentQuestion])->render();
    
        return response()->json([
            'result' => session('result'),
            'next_question' => $questionHtml,
        ]);
    }
    
}
