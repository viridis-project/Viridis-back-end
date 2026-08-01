<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguntaQuiz extends Model
{
    use HasFactory;

    protected $table = 'pergunta_quiz';
    public $timestamps = false;

    protected $fillable = [
        'criador_id',
        'texto_pergunta',
        'pontos_recompensa',
    ];
}
