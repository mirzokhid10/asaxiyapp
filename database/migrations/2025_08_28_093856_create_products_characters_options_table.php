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
        Schema::create('products_characters_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_character_id')
                ->constrained('products_characters')
                ->cascadeOnDelete();
            $table->string('label');     // option text shown to user
            $table->string('value')->nullable(); // optional machine value
            $table->unsignedInteger('sort_order')->default(0);


            $table->index(['product_character_id','label']); // fast lookup by label

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_characters_options');
    }
};
