<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pergunta_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criador_id');
            $table->text('texto_pergunta');
            $table->integer('pontos_recompensa')->nullable()->default(5);

            $table->foreign('criador_id')->references('id')->on('usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pergunta_quiz');
    }
};