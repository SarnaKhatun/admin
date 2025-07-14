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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index();
            $table->string('name_bn')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('husband_or_wife_name_en')->nullable();
            $table->string('husband_or_wife_name_bn')->nullable();
            $table->text('present_address_en')->nullable();
            $table->text('present_address_bn')->nullable();
            $table->text('permanent_address_en')->nullable();
            $table->text('permanent_address_bn')->nullable();
            $table->string('village_en')->nullable();
            $table->string('village_bn')->nullable();
            $table->string('post_office_en')->nullable();
            $table->string('post_office_bn')->nullable();
            $table->string('thana_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile_number')->unique()->nullable();
            $table->string('dob')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('occupation')->nullable();
            $table->string('date')->nullable();
            $table->text('image')->nullable();
            $table->text('signature_image')->nullable();
            $table->string('client_number')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};