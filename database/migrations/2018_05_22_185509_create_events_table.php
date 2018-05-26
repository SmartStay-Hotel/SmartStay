<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            //Columns
            $table->increments('id');
            $table->unsignedInteger('guest_id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('event_type_id'); //pendiente de tabla
            $table->date('order_date');
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();

            //FK
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');

            //FK event_types
            $table->foreign('event_type_id')->references('id')->on('event_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
