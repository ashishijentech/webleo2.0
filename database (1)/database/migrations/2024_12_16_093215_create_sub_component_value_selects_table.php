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
        Schema::create('sub_component_value_selects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('component_id');
            $table->foreign('component_id')->nullable()->references('id')->on('components')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('component_value_id');
            $table->foreign('component_value_id')->nullable()->references('id')->on('component_options')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('type');
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_component_value_selects');
    }
};