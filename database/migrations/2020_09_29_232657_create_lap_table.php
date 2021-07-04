<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laps', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->unsignedBigInteger('track_layout_id');
            $table->foreign('track_layout_id')->references('id')->on('track_layouts');
            $table->unsignedBigInteger('car_configuration');
            $table->foreign('car_configuration')->references('id')->on('car_configurations');

            $table->integer('session_number');
            $table->dateTime('date_time');
            $table->time('lap_time', 4);
            $table->integer('air_temperature');
            $table->integer('track_surface_temperature');
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
        Schema::dropIfExists('laps');
    }
}
