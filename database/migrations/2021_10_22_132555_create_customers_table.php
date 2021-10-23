<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('membership_level_id')->unsigned();
            $table->string('surname');
            $table->string('firstname');
            $table->string('phonenumber');
            $table->string('address');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::table('customer', function($table) {
            $table->foreign('account_id')->references('id')->on('account');
            $table->foreign('membership_level_id')->references('id')->on('membership_level');
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
}
