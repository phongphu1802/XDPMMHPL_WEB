<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('screen_id')->unsigned();
            $table->integer('ram_id')->unsigned();
            $table->integer('card_id')->unsigned();
            $table->integer('computerchips')->unsigned();
            $table->integer('producer_id')->unsigned();
            $table->integer('quantity');
            $table->string('importprice');
            $table->string('saleprice');
            $table->date('dates');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::table('product', function($table) {
            $table->foreign('screen_id')->references('id')->on('screen');
            $table->foreign('ram_id')->references('id')->on('ram');
            $table->foreign('card_id')->references('id')->on('card');
            $table->foreign('computerchips')->references('id')->on('computerchips');
            $table->foreign('producer_id')->references('id')->on('producer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
