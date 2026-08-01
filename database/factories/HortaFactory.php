<?php

namespace Database\Factories;

use App\Models\Instituicao;
use Illuminate\Database\Eloquent\Factories\Factory;

class HortaFactory extends Factory
{
    protected $model = \App\Models\Horta::class;

    public function definition(): array
    {
        return [
            'nome' => 'Horta ' . fake('pt_BR')->word(),
            'instituicao_id' => Instituicao::factory(),
            'localizacao' => fake('pt_BR')->address(),
        ];
    }
}
