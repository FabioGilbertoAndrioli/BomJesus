<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('problema');
            $table->string('tecnico');
            $table->timestamps();
        });

        Schema::create('device_suport', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('device_id')->unsigned();
            $table->bigInteger('suport_id')->unsigned();

            $table->foreign('device_id')
                  ->references('id')
                  ->on('devices')->onDelete('cascade');

            $table->foreign('suport_id')
                  ->references('id')
                  ->on('suports')->onDelete('cascade');


            $table->softDeletes();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suports');
    }
}
