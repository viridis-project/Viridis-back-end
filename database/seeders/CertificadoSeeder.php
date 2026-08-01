<?php

namespace Database\Seeders;

use App\Models\Certificado;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class CertificadoSeeder extends Seeder
{
    public function run(): void
    {
        $alunosDestaque = Usuario::where('perfil_id', Perfil::where('nome', 'Aluno')->firstOrFail()->id)
            ->where('pontos_totais', '>=', 300)
            ->get();

        $alunosDestaque->each(function (Usuario $aluno) {
            Certificado::factory()->create([
                'aluno_id' => $aluno->id,
            ]);
        });
    }
}