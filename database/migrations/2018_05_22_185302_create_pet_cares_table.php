<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetCaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_cares', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id');
            $table->integer('service_id');
            $table->date('order_date');
            $table->boolean('water');
            $table->boolean('standard_food');
            $table->boolean('premium_food');
            $table->boolean('snacks');
            $table->double('price');
            //Revisar!! 0: cancelado, 1: solicitado, 2: Entregado (Mejor bool (solo dos estado)???)
            $table->enum('status',['0','1', '2']);
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
        Schema::dropIfExists('pet_cares');
    }
}
