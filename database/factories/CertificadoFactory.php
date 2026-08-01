<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificadoFactory extends Factory
{
    protected $model = \App\Models\Certificado::class;

    public function definition(): array
    {
        return [
            'aluno_id' => Usuario::factory(),
            'codigo_verificacao' => strtoupper(fake()->unique()->bothify('CERT-####-????')),
            'url_pdf' => fake()->url() . '/certificado.pdf',
            'data_emissao' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
