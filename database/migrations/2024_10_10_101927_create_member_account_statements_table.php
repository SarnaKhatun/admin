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
        Schema::create('member_account_statements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membership_account_id')->nullable()->index();
            $table->date('date')->index();
            $table->string('particular', 191)->default(1)->comment('Opening Balance, Deposit, Withdraw, Yearly Profit, Yearly Service Charge');
            $table->string('receipt_number')->nullable();
            $table->decimal('deposit', 10, 2);
            $table->decimal('withdraw', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->unsignedBigInteger('created_by')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_account_statements');
    }
};
