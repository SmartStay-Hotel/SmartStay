<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxis', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id'); //FK
            $table->unsignedInteger('service_id');
            $table->dateTime('day_hour');
            $table->date('order_date');
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
        Schema::dropIfExists('taxis');
    }
}
