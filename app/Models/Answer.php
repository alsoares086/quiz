<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer_text', // O texto da alternativa
        'is_correct',  // Se a alternativa é a correta (0 ou 1)
        'question_id', // O ID da pergunta à qual a alternativa pertence
    ];

    // Relacionamento com a tabela 'questions'
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
