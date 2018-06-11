<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('motores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo');
            $table->string('numeracion')->unique();
            $table->string('descripcion');
            $table->integer('avion_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            //
            $table->foreign('avion_id')->references('id')->on('aviones')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
