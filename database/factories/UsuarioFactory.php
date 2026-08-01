<?php

namespace Database\Factories;

use App\Models\Instituicao;
use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = \App\Models\Usuario::class;

    public function definition(): array
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'email' => fake()->unique()->safeEmail(),
            'senha' => Hash::make('password'),
            'cpf' => fake('pt_BR')->unique()->cpf(),
            'telefone' => fake('pt_BR')->cellphoneNumber(),
            'pontos_totais' => fake()->numberBetween(0, 500),
            'perfil_id' => Perfil::factory(),
            'instituicao_id' => Instituicao::factory(),
            'data_criacao' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }

    /**
     * Estado: usuário com perfil de Aluno.
     */
    public function aluno(): static
    {
        return $this->state(fn () => [
            'perfil_id' => Perfil::factory()->state(['nome' => 'Aluno']),
        ]);
    }

    /**
     * Estado: usuário com perfil de Professor.
     */
    public function professor(): static
    {
        return $this->state(fn () => [
            'perfil_id' => Perfil::factory()->state(['nome' => 'Professor']),
        ]);
    }

    /**
     * Estado: sem instituição vinculada (coluna é nullable no banco).
     */
    public function semInstituicao(): static
    {
        return $this->state(fn () => [
            'instituicao_id' => null,
        ]);
    }
}
