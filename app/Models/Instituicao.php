<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

    protected $table = 'instituicao';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cnpj',
        'data_cadastro',
    ];

    protected $casts = [
        'data_cadastro' => 'datetime',
    ];
}
