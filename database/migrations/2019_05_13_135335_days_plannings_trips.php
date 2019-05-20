<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaysPlanningsTrips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_plannings_trips', function (Blueprint $table) {
            $table->increments('day_planning_trip_id')->unique();
            $table->integer('trip_id');
            $table->integer('traveller_id');        
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
        Schema::dropIfExists('day_plannings_trips');
    }
}
