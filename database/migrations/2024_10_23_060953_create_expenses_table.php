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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('expense_head_id')->nullable()->index();
            $table->string('expense_sub_head_id')->nullable()->index();
            $table->string('purpose');
            $table->string('amount_head', 100);
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('payment_method_id')->nullable()->index();
            $table->unsignedBigInteger('account_id')->nullable()->index();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
