<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\PerguntaQuiz;
use App\Models\ProgressoQuiz;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ProgressoQuizSeeder extends Seeder
{
    public function run(): void
    {
        $alunos = Usuario::where('perfil_id', Perfil::where('nome', 'Aluno')->firstOrFail()->id)->get();
        $perguntas = PerguntaQuiz::all();

        if ($perguntas->isEmpty()) {
            return;
        }

        $alunos->each(function (Usuario $aluno) use ($perguntas) {
            $perguntasRespondidas = $perguntas->random(min(rand(3, 8), $perguntas->count()));

            foreach ($perguntasRespondidas as $pergunta) {
                ProgressoQuiz::factory()->create([
                    'aluno_id' => $aluno->id,
                    'pergunta_id' => $pergunta->id,
                ]);
            }
        });
    }
}
