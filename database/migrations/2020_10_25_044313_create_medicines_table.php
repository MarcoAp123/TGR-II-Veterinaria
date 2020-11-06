<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->references('id')->on('providers')->nullable();
            $table->string('name');
            $table->string('company');
            $table->integer('quantity');
            $table->decimal('sale_price', 6, 2);
            $table->decimal('purchase_price', 6, 2);
            $table->integer('lot');
            $table->dateTime('date_expiry');
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
        Schema::dropIfExists('medicines');
    }
}
