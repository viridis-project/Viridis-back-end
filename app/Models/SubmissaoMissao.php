<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissaoMissao extends Model
{
    use HasFactory;

    protected $table = 'submissao_missao';
    public $timestamps = false;

    protected $fillable = [
        'aluno_id',
        'missao_id',
        'url_foto',
        'ia_validada',
        'professor_validado',
        'data_envio',
    ];

    protected $casts = [
        'ia_validada' => 'boolean',
        'professor_validado' => 'boolean',
        'data_envio' => 'datetime',
    ];
}
