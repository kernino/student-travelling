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
            $table->string('is_active');
            $table->string('year');
            $table->string('price');
            $table->string('contact_mail');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('destination');
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
