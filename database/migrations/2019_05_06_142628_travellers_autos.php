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
            $table->string('auto_trip_id');
            $table->string('traveller_id');
            $table->timestamps();
            //$table->foreign('auto_trip_id')->references('auto_trip_id')->on('autos_trips');
            //$table->foreign('traveller_id')->references('traveller_id')->on('travellers');
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
