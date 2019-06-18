<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DaysPlannings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_plannings', function (Blueprint $table) {
            $table->increments('day_planning_id')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('end_location');
            $table->string('highlight')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('day_plannings');
    }
}
