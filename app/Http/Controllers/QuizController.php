<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    public function index()
    {
        // Fazendo a requisição à API para pegar perguntas de TI
        $response = Http::get('https://opentdb.com/api.php', [
            'amount' => 10,       // Número de perguntas
            'category' => 18,     // Categoria de TI
            'difficulty' => 'medium', // Dificuldade média
            'type' => 'multiple', // Tipo de pergunta (múltipla escolha)
        ]);

        $questions = collect($response->json()['results']); // Pegando os resultados da API

        return view('quiz.index', ['questions' => $questions]);
    }

    public function answer(Request $request)
    {
        // Verifica a resposta do usuário
        $correct = $request->answer == $request->correct_answer;

        // Redireciona de volta com uma mensagem de resultado
        session()->flash('result', $correct ? 'Correto!' : 'Errado!');
        
        return redirect()->route('quiz.index');
    }
}
