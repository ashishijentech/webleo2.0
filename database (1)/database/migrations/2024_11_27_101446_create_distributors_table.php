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
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('manuf_id');
            $table->foreign('manuf_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('business_name');
            $table->string('gender');
            $table->string('mobile');
            $table->string('dob');
            $table->string('is_map_device_edit');
            $table->string('pan_number');
            $table->string('occupation');
            $table->string('advance_payment');
            $table->string('language_known');
            $table->string('country');
            $table->string('state');
            $table->string('rto_devision');
            $table->string('district');
            $table->string('pincode');
            $table->string('area');
            $table->longText('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};
