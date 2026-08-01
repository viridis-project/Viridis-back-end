<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opcao_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pergunta_id');
            $table->string('texto_opcao', 255);
            $table->boolean('is_correta')->default(false);

            $table->foreign('pergunta_id')->references('id')->on('pergunta_quiz')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opcao_quiz');
    }
};