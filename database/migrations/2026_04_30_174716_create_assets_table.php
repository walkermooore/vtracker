<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Aqui eu defino a tabela de 'Assets' (Ativos).
        // Um ativo é basicamente o sistema, API ou infraestrutura onde o pentest foi realizado.
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do projeto/sistema testado
            $table->string('url_or_ip')->nullable(); // Onde a aplicação está hospedada (útil para o time de Blue Team mapear)
            $table->text('description')->nullable(); // Contexto sobre as tecnologias usadas no ativo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
