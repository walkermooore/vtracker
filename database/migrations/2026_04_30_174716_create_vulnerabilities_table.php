<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Esta é a tabela core do sistema. Ela armazena o report de cada falha encontrada.
        Schema::create('vulnerabilities', function (Blueprint $table) {
            $table->id();

            // Relacionamentos Fortes (Foreign Keys)
            // 'cascadeOnDelete' garante que se um ativo ou usuário for deletado, suas falhas atreladas não fiquem órfãs no banco.
            $table->foreignId('asset_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();

            // Dados Técnicos da Vulnerabilidade
            $table->string('title'); // Título direto (Ex: SQLi no endpoint de Login)
            $table->text('description'); // Detalhamento de como a falha funciona
            $table->text('proof_of_concept')->nullable(); // Payload ou passos para reprodução da falha (PoC)

            // Métricas de Risco
            // Usei decimal(4,1) para permitir pontuações CVSS exatas, como 9.8 ou 10.0
            $table->decimal('cvss_score', 4, 1)->nullable();
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);

            // Controle de Ciclo de Vida do Ticket
            $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vulnerabilities');
    }
};
