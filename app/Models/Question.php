<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', // Adicione outros campos que você tenha na tabela questions
    ];

    // Relacionamento com a tabela 'answers'
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}