<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspecaoHorta extends Model
{
    use HasFactory;

    protected $table = 'inspecao_horta';
    public $timestamps = false;

    protected $fillable = [
        'horta_id',
        'responsavel_id',
        'qtd_plantas',
        'observacoes',
        'data_inspecao',
    ];

    protected $casts = [
        'data_inspecao' => 'datetime',
    ];
}
