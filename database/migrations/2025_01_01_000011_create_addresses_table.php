<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de endereços dos imóveis.
     * Cada anúncio possui exatamente um endereço.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            // Relacionamento 1:1 com listings
            $table->foreignId('listing_id')
                  ->unique()
                  ->constrained('listings')
                  ->onDelete('cascade');

            $table->string('street', 200);          // Rua / Avenida
            $table->string('number', 20);           // Número
            $table->string('complement', 100)->nullable(); // Apto, Bloco, etc.
            $table->string('neighborhood', 100);    // Bairro
            $table->string('city', 100);            // Cidade
            $table->string('state', 2);             // UF (ex: SP, MG, RJ)
            $table->string('zip_code', 9);          // CEP (ex: 01310-100)

            // Coordenadas para mapa (opcional)
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverte a migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
