<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->integer('price_cents');
            $table->string('type'); // quarto, kitnet, apartamento
            $table->string('status')->default('ativo');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->boolean('furnished')->default(false);
            $table->boolean('pets_allowed')->default(false);
            $table->boolean('internet_included')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
