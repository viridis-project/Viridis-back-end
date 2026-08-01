<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cronograma_aluno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->foreignId('missao_id');
            $table->dateTime('data_sugerida')->nullable();
            $table->dateTime('data_limite_personalizada')->nullable();
            $table->string('status_atividade', 20)->default('Pendente');

            $table->foreign('aluno_id')->references('id')->on('usuario');
            $table->foreign('missao_id')->references('id')->on('missao');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cronograma_aluno');
    }
};