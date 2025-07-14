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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->string('account_name', 100)->nullable();
            $table->string('account_number', 50)->unique()->nullable();
            $table->string('bank_name', 100)->nullable();
            $table->string('branch', 100)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();

            // Index
            $table->index('payment_method_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
