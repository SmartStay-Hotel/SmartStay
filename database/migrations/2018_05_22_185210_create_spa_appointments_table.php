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
            $table->enum('status',['0','1', '2']);
            $table->timestamps();

            //FK
            //Revisar!! Es necesario crear FK en todos los servicios hacia guests??
            //Para poner onCascade: ->onDelete('cascade'); Por defecto no lo aplica
            $table->foreign('guest_id')->references('id')->on('guests');
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
