<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bracode_custom_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barcode_id')->nullable();
            $table->foreign('barcode_id')->references('id')->on('barcodes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('customFieldId');
            $table->foreign('customFieldId')->references('id')->on('customfields')->onUpdate('cascade')->onDelete('cascade');
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bracode_custom_values');
    }
};