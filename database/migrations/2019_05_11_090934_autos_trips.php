<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutosTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos_trips', function (Blueprint $table) {
            $table->increments('auto_trip_id')->unique();
            $table->integer('trip_id');
            //$table->foreign('trip_id')->references('trip_id')->on('trips');
            $table->integer('auto_id');
            //$table->foreign('auto_id')->references('auto_id')->on('autos');
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
        Schema::dropIfExists('autos_trips');
    }
}
