<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('context')->nullable()->unique();
            $table->string('route_name')->nullable();
            $table->string('seoable_type')->nullable();
            $table->unsignedBigInteger('seoable_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable()->default('index, follow');
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->nullable()->default('website');
            $table->string('og_url')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_image_url')->nullable();
            $table->string('og_image_alt')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('twitter_card')->nullable()->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_image_url')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->text('schema_markup')->nullable();
            $table->json('extras')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['seoable_type', 'seoable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_entries');
    }
};


