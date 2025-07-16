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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->string('title');
            $table->string('heading');
            $table->string('url');
            $table->text('details');
            $table->string('other_title')->nullable();
            $table->string('other_heading')->nullable();
            $table->text('image')->nullable();
            $table->string('status')->default('Inactive')->comment('Inactive, Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
