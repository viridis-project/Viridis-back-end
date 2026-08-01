<?php

namespace Database\Seeders;

use App\Models\CronogramaAluno;
use App\Models\Missao;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class CronogramaAlunoSeeder extends Seeder
{
    public function run(): void
    {
        $alunos = Usuario::where('perfil_id', Perfil::where('nome', 'Aluno')->firstOrFail()->id)->get();
        $missoes = Missao::all();

        if ($missoes->isEmpty()) {
            return;
        }

        $alunos->each(function (Usuario $aluno) use ($missoes) {
            $missoesSorteadas = $missoes->random(min(rand(3, 6), $missoes->count()));

            foreach ($missoesSorteadas as $missao) {
                CronogramaAluno::factory()->create([
                    'aluno_id' => $aluno->id,
                    'missao_id' => $missao->id,
                ]);
            }
        });
    }
}
