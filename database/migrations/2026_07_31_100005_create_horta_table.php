<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horta', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->foreignId('instituicao_id');
            $table->string('localizacao', 255)->nullable();

            $table->foreign('instituicao_id')->references('id')->on('instituicao');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horta');
    }
};