<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TravellersTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travellers_trips', function (Blueprint $table) {
            $table->increments('traveller_trip_id')->unique();
            $table->unsignedInteger('trip_id');
            $table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->unsignedInteger('traveller_id');  
            $table->foreign('traveller_id')->references('traveller_id')->on('travellers');
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
        Schema::dropIfExists('travellers_trips');
    }
}
