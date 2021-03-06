<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('state',['0','1','2'])->default('0');
            $table->date('fecha');
            $table->string('hora_desde');
            $table->string('hora_hasta');
            $table->string('horas');
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
