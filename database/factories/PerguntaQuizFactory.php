<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerguntaQuizFactory extends Factory
{
    protected $model = \App\Models\PerguntaQuiz::class;

    public function definition(): array
    {
        return [
            'criador_id' => Usuario::factory(),
            'texto_pergunta' => ucfirst(fake('pt_BR')->sentence(10)) . '?',
            'pontos_recompensa' => fake()->numberBetween(5, 20),
        ];
    }
}
