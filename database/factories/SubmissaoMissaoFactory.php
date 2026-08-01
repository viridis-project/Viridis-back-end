<?php

namespace Database\Factories;

use App\Models\Missao;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissaoMissaoFactory extends Factory
{
    protected $model = \App\Models\SubmissaoMissao::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Usuario::factory(),
            'missao_id' => Missao::factory(),
            'url_foto' => fake()->imageUrl(640, 480, 'nature', true),
            'ia_validada' => fake()->boolean(80),
            'professor_validado' => fake()->boolean(60),
            'data_envio' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
