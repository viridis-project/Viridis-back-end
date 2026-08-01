<?php

namespace Database\Seeders;

use App\Models\Missao;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class MissaoSeeder extends Seeder
{
    public function run(): void
    {
        $professores = Usuario::where('perfil_id', Perfil::where('nome', 'Professor')->firstOrFail()->id)->get();

        for ($i = 0; $i < 20; $i++) {
            Missao::factory()->create([
                'criador_id' => $professores->random()->id,
            ]);
        }
    }
}
