<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstituicaoFactory extends Factory
{
    protected $model = \App\Models\Instituicao::class;

    public function definition(): array
    {
        return [
            'nome' => fake('pt_BR')->company(),
            'cnpj' => fake('pt_BR')->unique()->cnpj(),
            'data_cadastro' => fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
