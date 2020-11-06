<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('date_id')->nullable()->constrained();
            $table->foreignId('user_id')->references('id')->on('users')->nullable();
            $table->foreignId('client_id')->references('id')->on('clients')->nullable();
            $table->foreignId('pet_id')->references('id')->on('pets')->nullable();
            $table->decimal('weight',6 ,3);
            $table->integer('age');
            $table->decimal('temperature', 6, 2);
            $table->integer('heart_rate');
            $table->string('diagnostic');
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
        Schema::dropIfExists('consultations');
    }
}
