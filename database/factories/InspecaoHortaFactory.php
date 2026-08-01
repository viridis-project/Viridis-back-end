<?php

namespace Database\Factories;

use App\Models\Horta;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class InspecaoHortaFactory extends Factory
{
    protected $model = \App\Models\InspecaoHorta::class;

    public function definition(): array
    {
        return [
            'horta_id' => Horta::factory(),
            'responsavel_id' => Usuario::factory(),
            'qtd_plantas' => fake()->numberBetween(5, 200),
            'observacoes' => fake('pt_BR')->sentence(12),
            'data_inspecao' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
