<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomsHotelsTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms_hotels_trips', function (Blueprint $table) {
            $table->increments('room_hotel_trip_id')->unique();
            $table->integer('hotel_trip_id');
            //$table->foreign('hotel_trip_id')->references('hotel_trip_id')->on('hotels_trips');
            $table->integer('size');
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
        Schema::dropIfExists('rooms_hotels_trips');
    }
}
