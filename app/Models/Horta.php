<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horta extends Model
{
    use HasFactory;

    protected $table = 'horta';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'instituicao_id',
        'localizacao',
    ];
}
