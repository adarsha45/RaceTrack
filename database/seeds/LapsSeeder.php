<?php

use App\Lap;
use Illuminate\Database\Seeder;

class LapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $xr6 = DB::table('cars')->where('name', 'Road Car')->first();

        $drivers=[1, 2];
        $carConfigs=[1, 2, 3];
        $trackLayouts=[1, 2, 3, 4, 5, 6];

        foreach($drivers as $driver){
            foreach ($carConfigs as $config){
                foreach($trackLayouts as $layout) {
                    $laps = [
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-01 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 2,
                            'date_time' => "2020-03-02 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-03 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-04 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-05 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-06 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-07 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-08 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-09 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],
                        [
                            'driver_id' => $driver,
                            'track_layout_id' => $layout,
                            'car_configuration' => $config,
                            'session_number' => 1,
                            'date_time' => "2020-03-19 12:00:01",
                            'lap_time' => rand(130,131) + rand(0, 33)/100,
                            'air_temperature' => 30,
                            'track_surface_temperature' => 40
                        ],

                    ];

                    foreach ($laps as $lap) {
                        Lap::create($lap);
                    }
                }

                }
            }
        }



}
