<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progresso_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->foreignId('pergunta_id');
            $table->boolean('acertou');
            $table->dateTime('data_resposta')->nullable()->useCurrent();

            $table->foreign('aluno_id')->references('id')->on('usuario');
            $table->foreign('pergunta_id')->references('id')->on('pergunta_quiz');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progresso_quiz');
    }
};