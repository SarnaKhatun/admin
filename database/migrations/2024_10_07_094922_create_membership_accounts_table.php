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
        Schema::create('membership_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('client_id')->nullable();
            $table->unsignedBigInteger('director_id')->nullable()->comment('reference');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->decimal('opening_balance', 10, 2)->nullable();
            $table->string('special_instruction')->nullable();
            $table->string('account_number')->unique()->nullable();
            $table->string('date')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable()->index();
            $table->unsignedBigInteger('account_id')->nullable()->index();
            // Nominee
            $table->string('nominee_name_bn',100)->nullable();
            $table->string('nominee_client_id',100)->nullable();
            $table->string('relation_with_member',50)->nullable();
            $table->string('nominee_dob',15)->nullable();
            $table->string('nominee_nid_number',50)->nullable();
            $table->text('nominee_address')->nullable();
            $table->string('client_number')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=Inactive, 1=Active');
            $table->softDeletes();
            $table->timestamps();

            // Index
            $table->index('director_id');
            $table->index('package_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_accounts');
    }
};
