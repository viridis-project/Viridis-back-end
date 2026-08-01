<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressoQuiz extends Model
{
    use HasFactory;

    protected $table = 'progresso_quiz';
    public $timestamps = false;

    protected $fillable = [
        'aluno_id',
        'pergunta_id',
        'acertou',
        'data_resposta',
    ];

    protected $casts = [
        'acertou' => 'boolean',
        'data_resposta' => 'datetime',
    ];
}
