<?php

namespace Database\Seeders;

use App\Models\CronogramaAluno;
use App\Models\SubmissaoMissao;
use Illuminate\Database\Seeder;

class SubmissaoMissaoSeeder extends Seeder
{
    public function run(): void
    {
        // Nem todo item do cronograma vira submissão (nem todo aluno concluiu tudo)
        $total = CronogramaAluno::count();

        if ($total === 0) {
            return;
        }

        CronogramaAluno::inRandomOrder()
            ->limit((int) ($total * 0.7))
            ->get()
            ->each(function (CronogramaAluno $item) {
                SubmissaoMissao::factory()->create([
                    'aluno_id' => $item->aluno_id,
                    'missao_id' => $item->missao_id,
                ]);
            });
    }
}
