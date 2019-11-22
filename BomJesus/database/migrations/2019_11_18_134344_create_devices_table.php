<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',150);
            $table->string('brand',150); // marca
            $table->string('model',150)->nullable();
            $table->string('serialNumber')->nullable();
            $table->string('patrimony')->nullable();
            $table->string('ip')->nullable();

            $table->bigInteger('room_id')->unsigned();

            $table->foreign('room_id')
                  ->references('id')
                  ->on('rooms');

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
        Schema::dropIfExists('devices');
    }
}
