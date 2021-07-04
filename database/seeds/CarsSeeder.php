<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $cars = [
            [
                'user_id' => $user->id,
                'name' => 'Turbo MX5 Race Car',
                'make' => 'Mazda',
                'model' => 'MX5, NB',
                'year' => 1999
            ],
            [
                'user_id' => $user->id,
                'name' => 'Road Car',
                'make' => 'Ford',
                'model' => 'Falcon, FG',
                'year' => 2010
            ]
        ];

        foreach($cars as $car){
            Car::create($car);
        }
    }
}
