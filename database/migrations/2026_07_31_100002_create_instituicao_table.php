<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituicao', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('cnpj', 20)->nullable()->unique();
            $table->dateTime('data_cadastro')->nullable()->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituicao');
    }
};