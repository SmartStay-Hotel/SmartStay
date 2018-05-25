<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnacksAndDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snacks_and_drinks', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id');
            $table->integer('service_id');
            $table->date('order_date');
            $table->double('price');
            $table->string('name');
            //Revisar!! 0: cancelado, 1: solicitado, 2: Entregado (Mejor bool (solo dos estado)???)
            $table->tinyInteger('status');
            $table->timestamps();

            //FK
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
        Schema::dropIfExists('snacks_and_drinks');
    }
}
