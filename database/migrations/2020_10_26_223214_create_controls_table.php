<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_record_id')->references('id')->on('medical_records')->nullable();
            $table->foreignId('treatment_id')->references('id')->on('treatments')->nullable();
            $table->foreignId('medicine_id')->references('id')->on('medicines')->nullable();
            $table->integer('day')->nullable();
            $table->integer('week')->nullable();
            $table->string('state');
            $table->string('obsrevations');
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
        Schema::dropIfExists('controls');
    }
}
