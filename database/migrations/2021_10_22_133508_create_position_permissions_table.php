<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_permission', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('position_permission', function($table) {
            $table->foreign('permission_id')->references('id')->on('permission');
            $table->foreign('position_id')->references('id')->on('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_permissions');
    }
}
