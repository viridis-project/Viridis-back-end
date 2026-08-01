<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('descricao', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};