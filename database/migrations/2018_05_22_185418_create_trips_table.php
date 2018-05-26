<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id'); //FK
            $table->unsignedInteger('trip_type_id'); //FK
            $table->integer('service_id');
            $table->date('order_date');
            $table->dateTime('day_hour');
            //Se quitan los tres campos que pasan a la tabla trip_types!!!
            $table->enum('status',['0','1', '2']);
            $table->timestamps();

            //FK
            $table->foreign('guest_id')->references('id')->on('guests');
            //FK
            $table->foreign('trip_type_id')->references('id')->on('trip_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
