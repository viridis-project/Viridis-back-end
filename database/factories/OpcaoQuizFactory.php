<?php

namespace Database\Factories;

use App\Models\PerguntaQuiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpcaoQuizFactory extends Factory
{
    protected $model = \App\Models\OpcaoQuiz::class;

    public function definition(): array
    {
        return [
            'pergunta_id' => PerguntaQuiz::factory(),
            'texto_opcao' => fake('pt_BR')->sentence(5),
            'is_correta' => false,
        ];
    }

    /**
     * Estado: marca esta opção como a correta.
     */
    public function correta(): static
    {
        return $this->state(fn () => ['is_correta' => true]);
    }
}
