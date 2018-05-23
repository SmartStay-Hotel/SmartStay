<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpaAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spa_appointments', function (Blueprint $table) {
            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id');
            $table->integer('service_id');
            $table->date('order_date');
            $table->dateTime('day_hour');
            $table->string('treatment', 50);
            $table->integer('duration');
            $table->double('price');
            $table->boolean('status');
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
        Schema::dropIfExists('spa_appointments');
    }
}
