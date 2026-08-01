<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspecao_horta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horta_id');
            $table->foreignId('responsavel_id');
            $table->integer('qtd_plantas')->nullable();
            $table->text('observacoes')->nullable();
            $table->dateTime('data_inspecao')->nullable()->useCurrent();

            $table->foreign('horta_id')->references('id')->on('horta');
            $table->foreign('responsavel_id')->references('id')->on('usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspecao_horta');
    }
};