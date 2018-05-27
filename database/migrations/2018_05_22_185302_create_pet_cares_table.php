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
            $table->unsignedInteger('service_id');
            $table->boolean('water');
            $table->boolean('standard_food');
            $table->boolean('premium_food');
            $table->boolean('snacks');
            $table->date('order_date');
            $table->double('price');
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();

            //FK
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
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
