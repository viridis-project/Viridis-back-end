<?php

namespace Database\Seeders;

use App\Models\Instituicao;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $perfilAdmin = Perfil::where('nome', 'Administrador')->firstOrFail();
        $perfilGestor = Perfil::where('nome', 'Gestor Institucional')->firstOrFail();
        $perfilProfessor = Perfil::where('nome', 'Professor')->firstOrFail();
        $perfilAluno = Perfil::where('nome', 'Aluno')->firstOrFail();

        // Administradores da plataforma, sem vínculo com instituição
        Usuario::factory()->count(2)->create([
            'perfil_id' => $perfilAdmin->id,
            'instituicao_id' => null,
        ]);

        Instituicao::all()->each(function (Instituicao $instituicao) use ($perfilGestor, $perfilProfessor, $perfilAluno) {
            // 1 gestor por instituição
            Usuario::factory()->create([
                'perfil_id' => $perfilGestor->id,
                'instituicao_id' => $instituicao->id,
            ]);

            // 2 a 4 professores por instituição
            Usuario::factory()->count(rand(2, 4))->create([
                'perfil_id' => $perfilProfessor->id,
                'instituicao_id' => $instituicao->id,
            ]);

            // 10 a 20 alunos por instituição
            Usuario::factory()->count(rand(10, 20))->create([
                'perfil_id' => $perfilAluno->id,
                'instituicao_id' => $instituicao->id,
            ]);
        });
    }
}
