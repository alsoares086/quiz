<?php

namespace App\Http\Controllers;

use App\Services\QuizService;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    public function index()
    {
        $currentQuestion = $this->quizService->initializeQuiz();

        if (!$currentQuestion) {
            return view('quiz.result');
        }

        return view('quiz.index', ['question' => $currentQuestion]);
    }

    public function answer(Request $request)
    {
        $request->validate([
            'answer' => 'required|exists:answers,id',
            'question_id' => 'required|exists:questions,id'
        ]);

        $result = $this->quizService->processAnswer($request->question_id, $request->answer);

        if (!$result['next_question']) {
            return response()->json($result);
        }

        $nextQuestionHtml = view('quiz.partials.question', ['question' => $result['next_question']])->render();
        $result['next_question'] = $nextQuestionHtml;

        return response()->json($result);
    }

    public function result()
    {
        $result = session('result');

        return view('quiz.result', compact('result'));
    }
}
