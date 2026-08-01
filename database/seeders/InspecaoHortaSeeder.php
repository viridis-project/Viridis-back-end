<?php

namespace Database\Seeders;

use App\Models\Horta;
use App\Models\InspecaoHorta;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class InspecaoHortaSeeder extends Seeder
{
    public function run(): void
    {
        $perfisResponsaveis = Perfil::whereIn('nome', ['Professor', 'Gestor Institucional'])->pluck('id');

        $responsaveisPorInstituicao = Usuario::whereIn('perfil_id', $perfisResponsaveis)
            ->get()
            ->groupBy('instituicao_id');

        Horta::all()->each(function (Horta $horta) use ($responsaveisPorInstituicao) {
            $responsaveis = $responsaveisPorInstituicao->get($horta->instituicao_id);

            if (! $responsaveis || $responsaveis->isEmpty()) {
                return;
            }

            $quantidade = rand(2, 5);

            for ($i = 0; $i < $quantidade; $i++) {
                InspecaoHorta::factory()->create([
                    'horta_id' => $horta->id,
                    'responsavel_id' => $responsaveis->random()->id,
                ]);
            }
        });
    }
}
