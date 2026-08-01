<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missao extends Model
{
    use HasFactory;

    protected $table = 'missao';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'descricao',
        'pontos_recompensa',
        'criador_id',
        'data_criacao',
    ];

    protected $casts = [
        'data_criacao' => 'datetime',
    ];
}
