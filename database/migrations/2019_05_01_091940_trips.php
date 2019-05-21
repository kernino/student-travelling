<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('trip_id')->unique();
            $table->string('name');
            $table->boolean('is_active');
            $table->string('year');
            $table->double('price');
            $table->string('contact_mail');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('destination');
            $table->string('travel_code')->nullable();
            $table->text('transportation_info');
            $table->rememberToken();
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
        Schema::dropIfExists('trips');
    }
}
