<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id('id'); //To be used as a primary key for this table

            $table->unsignedBigInteger('user_id'); //Creates a column in the track table for a foreign key.
            $table->foreign('user_id')->references('id')->on('users'); //Assigns the foreign key
            // from the users table

            $table->string('name',  255);
            $table->string('location', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
