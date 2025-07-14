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
        Schema::create('balance_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from');
            $table->float('f_balance', 10)->default(0);
            $table->unsignedBigInteger('to');
            $table->float('t_balance', 10)->default(0);
            $table->float('amount', 10)->default(0);
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_transfers');
    }
};
