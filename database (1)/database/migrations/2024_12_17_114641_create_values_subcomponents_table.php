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
        Schema::create('values_subcomponents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_comp_id');
            $table->foreign('sub_comp_id')->nullable()->references('id')->on('sub_component_value_selects')->onUpdate('cascade')->onDelete('cascade');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values_subcomponents');
    }
};