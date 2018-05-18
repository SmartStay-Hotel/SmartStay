<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            //Columns
            $table->increments('id');
            $table->unsignedInteger('type_id');
            $table->integer('number');
            $table->integer('capacity');
            $table->boolean('disabled_adapted');
            $table->boolean('jacuzzi');
            $table->string('code', 6); //room code
            $table->timestamps();

            //FK
            $table->foreign('type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
