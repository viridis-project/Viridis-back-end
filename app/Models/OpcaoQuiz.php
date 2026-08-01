<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcaoQuiz extends Model
{
    use HasFactory;

    protected $table = 'opcao_quiz';
    public $timestamps = false;

    protected $fillable = [
        'pergunta_id',
        'texto_opcao',
        'is_correta',
    ];

    protected $casts = [
        'is_correta' => 'boolean',
    ];
}
