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
        Schema::create('service_purchasing_information', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('description');
            $table->string('cost');
            $table->string('account_type_id');
            $table->string('inclusive_tax');
            $table->string('purchase_tax');
            $table->string('supplier_id');
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
        Schema::dropIfExists('service_purchasing_information');
    }
};
