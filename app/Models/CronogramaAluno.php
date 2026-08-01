<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronogramaAluno extends Model
{
    use HasFactory;

    protected $table = 'cronograma_aluno';
    public $timestamps = false;

    protected $fillable = [
        'aluno_id',
        'missao_id',
        'data_sugerida',
        'data_limite_personalizada',
        'status_atividade',
    ];

    protected $casts = [
        'data_sugerida' => 'datetime',
        'data_limite_personalizada' => 'datetime',
    ];
}
