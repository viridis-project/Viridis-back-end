<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MissaoFactory extends Factory
{
    protected $model = \App\Models\Missao::class;

    public function definition(): array
    {
        return [
            'titulo' => fake('pt_BR')->sentence(4),
            'descricao' => fake('pt_BR')->paragraph(3),
            'pontos_recompensa' => fake()->numberBetween(10, 100),
            'criador_id' => Usuario::factory(),
            'data_criacao' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
