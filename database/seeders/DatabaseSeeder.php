<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Popula o banco na ordem que respeita as dependências (foreign keys).
     */
    public function run(): void
    {
        $this->call([
            PerfilSeeder::class,
            InstituicaoSeeder::class,
            UsuarioSeeder::class,
            MissaoSeeder::class,
            HortaSeeder::class,
            CronogramaAlunoSeeder::class,
            InspecaoHortaSeeder::class,
            PerguntaQuizSeeder::class,
            ProgressoQuizSeeder::class,
            SubmissaoMissaoSeeder::class,
            CertificadoSeeder::class,
        ]);
    }
}
