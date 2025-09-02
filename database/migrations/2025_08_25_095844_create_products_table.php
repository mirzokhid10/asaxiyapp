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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Category hierarchy
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->foreignId('child_category_id')->nullable()->constrained('categories')->onDelete('set null');

            // Basic info
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('thumb_image');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();

            // Inventory
            $table->integer('brand_id');
            $table->integer('qty');
            $table->string('sku')->nullable();

            // Pricing
            $table->decimal('price', 12, 2);
            $table->decimal('discount_price', 12, 2)->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();

            // Type & status
            $table->string('product_type')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('is_approved')->default(0);

            // SEO
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
