<?php

namespace Database\Seeders;

use App\Models\Horta;
use App\Models\Instituicao;
use Illuminate\Database\Seeder;

class HortaSeeder extends Seeder
{
    public function run(): void
    {
        Instituicao::all()->each(function (Instituicao $instituicao) {
            Horta::factory()
                ->count(rand(1, 2))
                ->create(['instituicao_id' => $instituicao->id]);
        });
    }
}
