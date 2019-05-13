<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Travellers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travellers', function (Blueprint $table) {
            $table->increments('travellers_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('zip_id');
            $table->unsignedBigInteger('major_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country');
            $table->string('address');
            $table->string('gender');
            $table->string('phone');
            $table->string('emergency_phone_1');
            $table->string('emergency_phone_2');
            $table->string('nationality');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('iban');
            $table->string('bic');
            $table->string('medical_issue');
            $table->text('medical_info');
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
        Schema::dropIfExists('travellers');
    }
}
