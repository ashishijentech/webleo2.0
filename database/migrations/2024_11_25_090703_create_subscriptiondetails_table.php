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
        Schema::create('subscriptiondetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parentId');
            $table->string('packageType');
            $table->string('packageName');
            $table->string('billingCycle');
            $table->string('description');
            $table->string('price');
            $table->string('isRenewal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptiondetails');
    }
};
