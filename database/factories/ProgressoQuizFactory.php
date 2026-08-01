<?php

namespace Database\Factories;

use App\Models\PerguntaQuiz;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressoQuizFactory extends Factory
{
    protected $model = \App\Models\ProgressoQuiz::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Usuario::factory(),
            'pergunta_id' => PerguntaQuiz::factory(),
            'acertou' => fake()->boolean(70),
            'data_resposta' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
