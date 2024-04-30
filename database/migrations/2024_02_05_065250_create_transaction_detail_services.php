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
        Schema::create('transaction_detail_services', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_detail_id');
            $table->string('service_date');
            $table->integer('service_id');
            $table->string('description');
            $table->string('qty');
            $table->string('rate');
            $table->string('amount');
            $table->string('vat');
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
        Schema::dropIfExists('transaction_detail_services');
    }
};
