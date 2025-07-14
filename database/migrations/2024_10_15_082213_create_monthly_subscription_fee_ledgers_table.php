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
        Schema::create('monthly_subscription_fee_ledgers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monthly_subscription_fee_id')->nullable();
            $table->string('date_range')->nullable();
            $table->string('package_value')->nullable()->index();
            $table->string('particular')->nullable();
            $table->decimal('monthly_amount', 10, 2)->nullable();
            $table->decimal('others_fee', 10, 2)->nullable();
            $table->decimal('due_amount', 10, 2)->default(0.00)->nullable();
            $table->decimal('advanced_amount', 10, 2)->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable()->index();
            $table->unsignedBigInteger('account_id')->nullable()->index();
            $table->timestamps();

            // Use shorter index name
            $table->index('monthly_subscription_fee_id', 'msf_fee_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_subscription_fee_ledgers');
    }
};
