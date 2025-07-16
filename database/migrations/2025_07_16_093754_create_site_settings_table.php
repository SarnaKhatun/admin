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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('business_name');
            $table->integer('business_hour');
            $table->string('email');
            $table->string('phone');
            $table->text('google_map');
            $table->text('address');
            $table->longText('description');
            $table->text('message');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('linkedin_link');
            $table->string('youtube_link');
            $table->string('instagram_link');
            $table->string('pinterest_link');
            $table->text('site_favicon')->nullable();
            $table->text('site_header_logo')->nullable();
            $table->text('site_footer_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
