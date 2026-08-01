<?php

namespace Database\Seeders;

use App\Models\OpcaoQuiz;
use App\Models\Perfil;
use App\Models\PerguntaQuiz;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class PerguntaQuizSeeder extends Seeder
{
    public function run(): void
    {
        $professores = Usuario::where('perfil_id', Perfil::where('nome', 'Professor')->firstOrFail()->id)->get();

        for ($i = 0; $i < 15; $i++) {
            $pergunta = PerguntaQuiz::factory()->create([
                'criador_id' => $professores->random()->id,
            ]);

            // 1 opção correta + 3 distratoras por pergunta
            OpcaoQuiz::factory()->correta()->create(['pergunta_id' => $pergunta->id]);
            OpcaoQuiz::factory()->count(3)->create(['pergunta_id' => $pergunta->id]);
        }
    }
}
