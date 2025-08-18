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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->text('banner_logo')->nullable();
            $table->string('banner_style')->nullable();
            $table->string('banner_url')->nullable();
            $table->string('banner_text')->nullable();
            $table->string('banner_app_image')->nullable();
            $table->string('banner_qr')->nullable();
            $table->string('banner_appstore')->nullable();
            $table->string('banner_googleplay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
