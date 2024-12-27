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
        Schema::create('i_m_e_i_n_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('IMEI_NO');
            $table->unsignedBigInteger('distributor_id')->nullable();
            $table->foreign('distributor_id')->nullable()->references('id')->on('distributors')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_m_e_i_n_o_s');
    }
};