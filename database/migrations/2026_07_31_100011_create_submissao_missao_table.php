<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissao_missao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->foreignId('missao_id');
            $table->string('url_foto', 500);
            $table->boolean('ia_validada')->nullable();
            $table->boolean('professor_validado')->nullable();
            $table->dateTime('data_envio')->nullable()->useCurrent();

            $table->foreign('aluno_id')->references('id')->on('usuario');
            $table->foreign('missao_id')->references('id')->on('missao');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissao_missao');
    }
};