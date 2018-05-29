<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('number')->unsigned();
            $table->integer('capacity')->unsigned();
            $table->boolean('disabled_adapted');
            $table->boolean('jacuzzi');
            $table->string('code', 6)->unique()->nullable(); //room code
            $table->tinyInteger('status')->nullable();
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
