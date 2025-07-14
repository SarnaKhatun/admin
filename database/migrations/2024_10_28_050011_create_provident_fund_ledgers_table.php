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
        Schema::create('provident_fund_ledgers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provident_fund_id')->nullable()->index()->comment('provident_fund');
            $table->string('reference')->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable()->index();
            $table->unsignedBigInteger('account_id')->nullable()->index();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('provident_fund_ledgers');
    }
};
