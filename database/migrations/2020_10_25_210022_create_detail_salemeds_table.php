<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSalemedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_salemeds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_sale_id')->references('id')->on('medicine_sales')->nullable();
            $table->foreignId('medicine_id')->references('id')->on('medicines')->nullable();
            $table->integer('quantity');
            $table->decimal('partial_cost', 6, 2);
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
        Schema::dropIfExists('detail_salemeds');
    }
}
