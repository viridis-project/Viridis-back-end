<?php

namespace Database\Factories;

use App\Models\Missao;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CronogramaAlunoFactory extends Factory
{
    protected $model = \App\Models\CronogramaAluno::class;

    public function definition(): array
    {
        $dataSugerida = fake()->dateTimeBetween('-2 months', '+1 month');
        $dataLimite = (clone $dataSugerida)->modify('+7 days');

        return [
            'aluno_id' => Usuario::factory(),
            'missao_id' => Missao::factory(),
            'data_sugerida' => $dataSugerida,
            'data_limite_personalizada' => $dataLimite,
            'status_atividade' => fake()->randomElement(['Pendente', 'Em Andamento', 'Concluída', 'Atrasada']),
        ];
    }
}
