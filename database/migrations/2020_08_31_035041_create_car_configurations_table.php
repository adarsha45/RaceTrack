<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_configurations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('car_id'); //Creates a column in the car configuration table for the foreign key.
            $table->foreign('car_id')->references('id')->on('cars'); //Assigns the foreign key

            $table->string('configuration_name');

            // ENGINE information
            $table->double('power', 6, 3)->nullable();
            $table->double('displacement', 6, 3)->nullable();
            $table->string('induction_type')->nullable();
            $table->string('fuel_type')->nullable();
            $table->text('engine_notes')->nullable();
            $table->double('boost_pressure', 6, 3)->nullable();

            // TIRE information
            $table->string('tire_make_model')->nullable();

            $table->double('tire_temperature_front_left', 6, 3)->nullable();
            $table->double('tire_temperature_front_right', 6, 3)->nullable();
            $table->double('tire_temperature_rear_left', 6, 3)->nullable();
            $table->double('tire_temperature_rear_right', 6, 3)->nullable();

            $table->double('cold_pressure_front_left', 6, 3)->nullable();
            $table->double('cold_pressure_front_right', 6, 3)->nullable();
            $table->double('cold_pressure_rear_left', 6, 3)->nullable();
            $table->double('cold_pressure_rear_right', 6, 3)->nullable();
            $table->double('hot_pressure_front_left', 6, 3)->nullable();
            $table->double('hot_pressure_front_right', 6, 3)->nullable();
            $table->double('hot_pressure_rear_left', 6, 3)->nullable();
            $table->double('hot_pressure_rear_right', 6, 3)->nullable();

            // CHASSIS information
            $table->double('ride_height_front_left', 6, 3)->nullable();
            $table->double('ride_height_front_right', 6, 3)->nullable();
            $table->double('ride_height_rear_left', 6, 3)->nullable();
            $table->double('ride_height_rear_right', 6, 3)->nullable();

            // SUSPENSION information
            $table->double('spring_rate_front_left', 6, 3)->nullable();
            $table->double('spring_rate_front_right', 6, 3)->nullable();
            $table->double('spring_rate_rear_left', 6, 3)->nullable();
            $table->double('spring_rate_rear_right', 6, 3)->nullable();

            $table->double('damper_setting_front_left', 6, 3)->nullable();
            $table->double('damper_setting_front_right', 6, 3)->nullable();
            $table->double('damper_setting_rear_left', 6, 3)->nullable();
            $table->double('damper_setting_rear_right', 6, 3)->nullable();

            $table->double('camber_front_left', 6, 3)->nullable();
            $table->double('camber_front_right', 6, 3)->nullable();
            $table->double('camber_rear_left', 6, 3)->nullable();
            $table->double('camber_rear_right', 6, 3)->nullable();
            $table->double('front_toe', 6, 3)->nullable();
            $table->double('rear_toe', 6, 3)->nullable();
            $table->double('caster', 6, 3)->nullable();

            $table->double('rollbar_diameter_front', 6, 3)->nullable();
            $table->double('rollbar_diameter_rear', 6, 3)->nullable();
            $table->double('rollbar_position_front', 6, 3)->nullable();
            $table->double('rollbar_position_rear', 6, 3)->nullable();

            // AERO information
            $table->double('brake_bias', 6, 3)->nullable();
            $table->text('wing_front')->nullable();
            $table->text('wing_rear')->nullable();
            $table->text('other_aero_notes')->nullable();

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
        Schema::dropIfExists('car_configurations');
    }
}
