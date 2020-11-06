<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSaleprodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_saleprods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_sale_id')->references('id')->on('product_sales')->nullable();
            $table->foreignId('product_id')->references('id')->on('products')->nullable();
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
        Schema::dropIfExists('detail_saleprods');
    }
}
