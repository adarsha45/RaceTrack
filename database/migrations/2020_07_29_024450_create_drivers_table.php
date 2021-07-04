<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('id');

            $table->unsignedBigInteger('user_id'); //Creates a column in the track table for the foreign key.
            $table->foreign('user_id')->references('id')->on('users'); //Assigns the foreign key
            // from the users table.

            $table->string('name', 255);
            $table->integer('weight' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
