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
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('product_type_id'); //pendiente de tabla
            $table->date('order_date');
            $table->double('price');
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();

            //FK
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
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
