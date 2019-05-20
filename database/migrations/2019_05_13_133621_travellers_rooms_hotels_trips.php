<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TravellersRoomsHotelsTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travellers_rooms', function (Blueprint $table) {
            $table->increments('traveller_room_id')->unique();           
            $table->string('room_hotel_trip_id')->nullable();
            $table->unsignedInteger('traveller_id');
            $table->foreign('traveller_id')->references('traveller_id')->on('travellers');
            $table->integer('room_id');
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
        Schema::dropIfExists('travellers_rooms');
    }
}
