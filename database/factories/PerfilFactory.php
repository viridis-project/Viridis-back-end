<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerfilFactory extends Factory
{
    protected $model = \App\Models\Perfil::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->randomElement(['Aluno', 'Professor', 'Gestor Institucional', 'Administrador']),
            'descricao' => fake('pt_BR')->sentence(8),
        ];
    }
}
