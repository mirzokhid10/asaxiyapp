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
        Schema::create('product_character_value_option', function (Blueprint $table) {
            $table->id();

            $table->foreignId('value_id')
                ->constrained('products_characters_values')
                ->cascadeOnDelete();

            $table->foreignId('option_id')
                ->constrained('products_characters_options')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['value_id', 'option_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_character_value_option');
    }
};
