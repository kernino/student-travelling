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
            $table->string('trip_id');
            $table->string('hotel_id');
            $table->string('hotel_start_date');
            $table->string('hotel_end_date');
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
