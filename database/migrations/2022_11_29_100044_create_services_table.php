<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('slug')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('seo_description')->nullable();
            $table->longText('seo_schema')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default(0);
            $table->string('banner_small_title')->nullable();
            $table->string('banner_big_title')->nullable();
            $table->longText('banner_description')->nullable();
            $table->string('banner_link_text')->nullable();
            $table->string('banner_link_url')->nullable();
            $table->boolean('banner_social')->default(0);
            $table->string('roadmaptitle')->nullable();
            $table->string('roadmapinfo')->nullable();
            $table->string('roadmapimage')->nullable();
            $table->string('industrytitle')->nullable();
            $table->string('industryinfo')->nullable();
            $table->string('projecttitle')->nullable();
            $table->string('projectinfo')->nullable();
            $table->string('faqtitle')->nullable();
            $table->string('faqinfo')->nullable();
            $table->string('faqimage')->nullable();
            $table->string('pricingtitle')->nullable();
            $table->string('pricinginfo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
