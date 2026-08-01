<?php

namespace Database\Seeders;

use App\Models\Instituicao;
use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    public function run(): void
    {
        Instituicao::factory()->count(5)->create();
    }
}
