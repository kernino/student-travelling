<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_trips', function (Blueprint $table) {
            $table->increments('hotel_trip_id')->unique();
            $table->integer('trip_id');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->integer('hotel_id');
            $table->foreign('hotel_id')->references('hotel_id')->on('hotels');
            $table->date('hotel_start_date');
            $table->date('hotel_end_date');
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
        Schema::dropIfExists('hotels_trips');
    }
}