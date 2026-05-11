<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de imagens dos anúncios.
     * Um anúncio pode ter múltiplas fotos.
     */
    public function up(): void
    {
        Schema::create('listing_images', function (Blueprint $table) {
            $table->id();

            // Relacionamento N:1 com listings
            $table->foreignId('listing_id')
                  ->constrained('listings')
                  ->onDelete('cascade');

            $table->string('image_url');            // Caminho ou URL da imagem
            $table->boolean('is_cover')->default(false); // Foto de capa
            $table->unsignedTinyInteger('order')->default(0); // Ordem de exibição

            $table->timestamps();
        });
    }

    /**
     * Reverte a migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_images');
    }
};
