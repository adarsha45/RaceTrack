<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {

            $table->id('id'); // PK column for this table

            $table->unsignedBigInteger('user_id'); // Create the column for the FK. This has to be an unsigned
            // big int, it needs to be the same type as the automatically generated users.id key that laravel uses for
            // the "users" table.
            $table->foreign('user_id')->references('id')->on('users'); // Assign the FK

            $table->string('name', 255); // Defining the max length of the string here isn't strictly,
            //as 255 is the default, but we'll do it anyway.
            $table->string('make', 255);
            $table->string('model', 255);
            $table->integer('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
