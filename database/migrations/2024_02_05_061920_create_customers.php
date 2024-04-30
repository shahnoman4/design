<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_type');
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->string('company_name');
            $table->string('customer_display_name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('mobile_no');
            $table->string('fax');
            $table->string('other');
            $table->string('website');
            $table->string('is_sub_customer')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('bill_for_parent')->nullable();
            $table->string('notes');
            $table->string('attachment');
            $table->string('payment_method_id')->nullable();
            $table->string('payment_terms');
            $table->string('sales_delivery_option')->nullable();
            $table->string('use_language')->nullable();
            $table->string('vat_reg_no')->nullable();
            $table->string('utr_no')->nullable();
            $table->string('billing_rate')->nullable();
            $table->string('account_no')->nullable();
            $table->string('expense_category')->nullable();
            $table->string('opening_no');
            $table->string('ask_of_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
