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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('email');
            $table->string('send_later');
            $table->string('status');
            $table->string('status_by');
            $table->string('status_date');
            $table->string('billing_address');
            $table->string('shipping_address');
            $table->string('estimate_date');
            $table->string('expiration_date');
            $table->string('ship_via');
            $table->string('shipping_date');
            $table->string('tracking_date');
            $table->string('estimate_message');
            $table->string('statement_message');
            $table->string('sub_total');
            $table->string('discount_type');
            $table->string('discount');
            $table->string('shipping_tax');
            $table->string('total');
            $table->string('estimate_total');
            $table->integer('created_by');
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
        Schema::dropIfExists('transaction_details');
    }
};
