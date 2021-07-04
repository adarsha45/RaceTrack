<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_layouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('track_id'); //Creates a column in the track table for the foreign key.
            $table->foreign('track_id')->references('id')->on('tracks'); //Assigns the foreign key

            $table->string('name',  255);
            $table->double('length', 6, 3);
            $table->boolean('direction_reversed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_layouts');
    }
}
