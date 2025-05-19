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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('services')->nullable();
            $table->string('order')->nullable();
            $table->boolean('status')->default(0);
            $table->string('banner_small_title')->nullable();
            $table->string('banner_big_title')->nullable();
            $table->longText('banner_description')->nullable();
            $table->string('banner_link_text')->nullable();
            $table->string('banner_link_url')->nullable();
            $table->boolean('banner_social')->default(0);
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
