<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('missao', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->text('descricao')->nullable();
            $table->integer('pontos_recompensa')->default(10);
            $table->foreignId('criador_id');
            $table->dateTime('data_criacao')->nullable()->useCurrent();

            $table->foreign('criador_id')->references('id')->on('usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missao');
    }
};