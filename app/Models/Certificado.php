<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;

    protected $table = 'certificado';
    public $timestamps = false;

    protected $fillable = [
        'aluno_id',
        'codigo_verificacao',
        'url_pdf',
        'data_emissao',
    ];

    protected $casts = [
        'data_emissao' => 'datetime',
    ];
}
