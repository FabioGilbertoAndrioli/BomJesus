<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('chromebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serieNumber');
            $table->string('patrimony')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->bigInteger('car_id')->unsigned();
            $table->foreign('car_id')
                  ->references('id')
                  ->on('cars');
        });

        Schema::create('reserves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('classes',150); // aula
            $table->string('level',150); // fundamental - médio - infatil
            $table->string('class',150); // turma
            $table->string('period',150);
            $table->dateTime('date');

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('car_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            $table->foreign('car_id')
                  ->references('id')
                  ->on('cars');

            $table->timestamps();
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
        Schema::dropIfExists('reserves');
        Schema::dropIfExists('chromebooks');
    }
}
