<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planning extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_plannings', function (Blueprint $table) {
            $table->increments('day_planning_id')->unique();
            $table->string('name');
            $table->date('date');
            $table->string('end_location');
            $table->string('highlight');
            $table->text('description');
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
