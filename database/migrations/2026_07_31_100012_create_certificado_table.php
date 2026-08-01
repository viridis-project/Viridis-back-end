<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id');
            $table->string('codigo_verificacao', 100)->unique();
            $table->string('url_pdf', 500)->nullable();
            $table->dateTime('data_emissao')->nullable()->useCurrent();

            $table->foreign('aluno_id')->references('id')->on('usuario');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificado');
    }
};