<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\CarConfiguration;

class CarConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        //
        //
        // Adds configs
        //
        //
        //


        $mx5 = DB::table('cars')->where('name', 'Turbo MX5 Race Car')->first();
        $xr6 = DB::table('cars')->where('name', 'Road Car')->first();

        $configurations = [
            [
                'car_id' => $xr6->id,
                'configuration_name' => 'Daily Driving',
                'power' => 200.000,
                'displacement' => 4.000,
                'induction_type' => 'NA',
                'fuel_type' => '98 Octane',
                'engine_notes' => 'None',
                'boost_pressure' => 0.0,

                'tire_make_model' => 'Nankang AR-1, 245 45 18',

                'tire_temperature_front_left' => 60.2,
                'tire_temperature_front_right' => 60.3,
                'tire_temperature_rear_left' => 70.1,
                'tire_temperature_rear_right' => 70.5,

                'cold_pressure_front_left' => 25.5,
                'cold_pressure_front_right' => 25.4,
                'cold_pressure_rear_left' => 25.5,
                'cold_pressure_rear_right' => 25.7,
                'hot_pressure_front_left' => 35.5,
                'hot_pressure_front_right' => 35.8,
                'hot_pressure_rear_left' => 37.1,
                'hot_pressure_rear_right' => 37.6,

                'ride_height_front_left' => 65.44,
                'ride_height_front_right' => 65.66,
                'ride_height_rear_left' => 85.12,
                'ride_height_rear_right' => 85.31,

                'spring_rate_front_left' => 7.5,
                'spring_rate_front_right' => 7.5,
                'spring_rate_rear_left' => 11.0,
                'spring_rate_rear_right' => 11.0,

                'damper_setting_front_left' => 2,
                'damper_setting_front_right' => 2,
                'damper_setting_rear_left' => 2,
                'damper_setting_rear_right' => 2,

                'brake_bias' => 62.5,

                'wing_front' => 0,
                'wing_rear' => 0,
                'other_aero_notes' => 'Bumper cut, bonnet vents, front guard vents',

                'camber_front_left' => 2.0,
                'camber_front_right' => 2.0,
                'camber_rear_left' => 1.5,
                'camber_rear_right' => 1.5,
                'front_toe' => 0.0,
                'rear_toe' => 0.5,
                'caster' => 7.5,

                'rollbar_diameter_front' => 25.24,
                'rollbar_diameter_rear' => 15.0,
                'rollbar_position_front' => 2,
                'rollbar_position_rear' => 1
            ],
            [
                'car_id' => $mx5->id,
                'configuration_name' => 'Road driving',
                'power' => 350.000,
                'displacement' => 1.945,
                'induction_type' => 'Forced, Turbo',
                'fuel_type' => 'Ethanol 85',
                'engine_notes' => 'Forged build, bored to 1.945l, o-ringed head',
                'boost_pressure' => 25.5,

                'tire_make_model' => 'Nankang AR-1, 245 45 15',

                'tire_temperature_front_left' => 60.2,
                'tire_temperature_front_right' => 60.3,
                'tire_temperature_rear_left' => 70.1,
                'tire_temperature_rear_right' => 70.5,

                'cold_pressure_front_left' => 25.5,
                'cold_pressure_front_right' => 25.4,
                'cold_pressure_rear_left' => 25.5,
                'cold_pressure_rear_right' => 25.7,
                'hot_pressure_front_left' => 35.5,
                'hot_pressure_front_right' => 35.8,
                'hot_pressure_rear_left' => 37.1,
                'hot_pressure_rear_right' => 37.6,

                'ride_height_front_left' => 65.44,
                'ride_height_front_right' => 65.66,
                'ride_height_rear_left' => 85.12,
                'ride_height_rear_right' => 85.31,

                'spring_rate_front_left' => 7.5,
                'spring_rate_front_right' => 7.5,
                'spring_rate_rear_left' => 11.0,
                'spring_rate_rear_right' => 11.0,

                'damper_setting_front_left' => 2,
                'damper_setting_front_right' => 2,
                'damper_setting_rear_left' => 2,
                'damper_setting_rear_right' => 2,

                'brake_bias' => 62.5,

                'wing_front' => 0,
                'wing_rear' => 0,
                'other_aero_notes' => 'Bumper cut, bonnet vents, front guard vents',

                'camber_front_left' => 2.0,
                'camber_front_right' => 2.0,
                'camber_rear_left' => 1.5,
                'camber_rear_right' => 1.5,
                'front_toe' => 0.0,
                'rear_toe' => 0.5,
                'caster' => 7.5,

                'rollbar_diameter_front' => 25.24,
                'rollbar_diameter_rear' => 15.0,
                'rollbar_position_front' => 2,
                'rollbar_position_rear' => 1
            ],
            [
                'car_id' => $mx5->id,
                'configuration_name' => 'Race Track',
                'power' => 445.000,
                'displacement' => 1.945,
                'induction_type' => 'Forced, Turbo',
                'fuel_type' => 'Ethanol 85',
                'engine_notes' => 'Forged build, bored to 1.945l, o-ringed head',
                'boost_pressure' => 35.5,

                'tire_make_model' => 'Nankang AR-1, 245 45 15',

                'tire_temperature_front_left' => 60.2,
                'tire_temperature_front_right' => 60.3,
                'tire_temperature_rear_left' => 70.1,
                'tire_temperature_rear_right' => 70.5,

                'cold_pressure_front_left' => 25.5,
                'cold_pressure_front_right' => 25.4,
                'cold_pressure_rear_left' => 25.5,
                'cold_pressure_rear_right' => 25.7,
                'hot_pressure_front_left' => 35.5,
                'hot_pressure_front_right' => 35.8,
                'hot_pressure_rear_left' => 37.1,
                'hot_pressure_rear_right' => 37.6,

                'ride_height_front_left' => 65.44,
                'ride_height_front_right' => 65.66,
                'ride_height_rear_left' => 85.12,
                'ride_height_rear_right' => 85.31,

                'spring_rate_front_left' => 7.5,
                'spring_rate_front_right' => 7.5,
                'spring_rate_rear_left' => 11.0,
                'spring_rate_rear_right' => 11.0,

                'damper_setting_front_left' => 10,
                'damper_setting_front_right' => 10,
                'damper_setting_rear_left' => 10,
                'damper_setting_rear_right' => 10,

                'brake_bias' => 62.5,

                'wing_front' => 5,
                'wing_rear' => 8,
                'other_aero_notes' => 'Bumper cut, bonnet vents, front guard vents',

                'camber_front_left' => 3.5,
                'camber_front_right' => 3.5,
                'camber_rear_left' => 2.5,
                'camber_rear_right' => 2.5,
                'front_toe' => 0.0,
                'rear_toe' => 0.5,
                'caster' => 7.5,

                'rollbar_diameter_front' => 25.24,
                'rollbar_diameter_rear' => 15.0,
                'rollbar_position_front' => 2,
                'rollbar_position_rear' => 1
            ],
        ];

        foreach($configurations as $config){
            CarConfiguration::create($config);
        }

    }
}
