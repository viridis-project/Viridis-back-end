<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    public function run(): void
    {
        $perfis = [
            ['nome' => 'Administrador', 'descricao' => 'Acesso total à plataforma, gerencia instituições e usuários.'],
            ['nome' => 'Gestor Institucional', 'descricao' => 'Responsável por uma instituição e suas hortas.'],
            ['nome' => 'Professor', 'descricao' => 'Cria missões, quizzes e valida submissões dos alunos.'],
            ['nome' => 'Aluno', 'descricao' => 'Participa de missões, quizzes e acompanha seu progresso.'],
        ];

        foreach ($perfis as $perfil) {
            Perfil::firstOrCreate(['nome' => $perfil['nome']], $perfil);
        }
    }
}
