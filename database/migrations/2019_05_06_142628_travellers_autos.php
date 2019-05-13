<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TravellersAutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travellers_autos', function (Blueprint $table) {
            $table->increments('traveller_auto_id')->unique();
            $table->string('autos_trip_id');
            $table->foreign('autos_trip_id')->references('autos_trip_id')->on('autos_trips');
            $table->string('traveller_id');
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
        Schema::dropIfExists('travellers_autos');
    }
}
