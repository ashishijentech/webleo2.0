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
        Schema::create('w_l_pdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('country');
            $table->string('state');
            $table->string('mobile_no');
            $table->string('parent_name')->nullable();
            $table->string('parent_code')->nullable();
            $table->string('website')->nullable();
            $table->string('web_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('sales_mobile_no')->nullable();
            $table->string('landline_no')->nullable();
            $table->string('smart_parent_app_package')->nullable();
            $table->string('show_powered_by')->nullable();
            $table->string('power_by')->nullable();
            $table->string('account_limit')->nullable();
            $table->string('http_sms_url')->nullable();
            $table->string('http_sms__gateway_method')->nullable();
            $table->string('gstn_no')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('isallowthirdpartyapi')->nullable();
            $table->string('default_lan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('w_l_pdetails');
    }
};
