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
        Schema::create('products_characters_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('product_character_id')->constrained('products_characters')->cascadeOnDelete();

            // Different types of values (only one will be filled depending on type)
            $table->string('value_string')->nullable();
            $table->text('value_text')->nullable();
            $table->bigInteger('value_integer')->nullable();
            $table->decimal('value_decimal', 20, 6)->nullable();
            $table->boolean('value_boolean')->nullable();
            $table->date('value_date')->nullable();

            // For select (single choice only)
            $table->foreignId('option_id')->nullable()
                ->constrained('products_characters_options')
                ->nullOnDelete();

            $table->unique(['product_id','product_character_id'], 'uniq_product_char'); // prevent duplicates
            $table->index(['product_character_id', 'value_string'], 'pcval_string_idx');
            $table->index(['product_character_id', 'value_integer'], 'pcval_integer_idx');
            $table->index(['product_character_id', 'value_decimal'], 'pcval_decimal_idx');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_characters_values');
    }
};
