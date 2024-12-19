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
        Schema::create('admindetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('business_name');
            $table->string('regd_address');
            $table->string('gstin_no');
            $table->string('pan_no');
            $table->string('name_of_the_business_owner');
            $table->string('contact_no')->unique();
            $table->string('gst_certificate');
            $table->string('pan_card');
            $table->string('incorporation_certificate');
            $table->string('logo');
            $table->enum('status', ['pending', 'active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admindetails');
    }
};
