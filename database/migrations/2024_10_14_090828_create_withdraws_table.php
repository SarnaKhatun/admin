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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membership_account_id')->nullable()->index();
            $table->string('member_number', '50')->nullable();
            $table->string('member_name', '50')->nullable();
            $table->string('director_name', '50')->nullable();
            $table->string('package', '50')->nullable();
            $table->decimal('total_collection', 10, 2)->nullable();
            $table->decimal('withdraw_amount', 10, 2)->nullable();
            $table->tinyInteger('withdraw_type')->default(0)->comment('0=Capital withdraw, 1=Membership withdraw');

            // Add payment-related fields

            $table->unsignedBigInteger('payment_method_id')->nullable()->index();
            $table->unsignedBigInteger('account_id')->nullable()->index();

            $table->text('note')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
