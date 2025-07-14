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
        Schema::create('monthly_subscription_fees', function (Blueprint $table) {
            $table->id();
            $table->json('membership_account_id')->nullable();
            $table->json('package_id')->nullable();
            $table->string('package_value')->nullable()->index();
            $table->string('particular')->nullable();
            $table->decimal('monthly_amount', 10, 2)->nullable();
            $table->decimal('others_fee', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_subscription_fees');
    }
};
