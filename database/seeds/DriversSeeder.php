<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Driver;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $drivers = [
            [
                'user_id' => $user->id,
                'name' => 'Alice',
                'weight' => 80
            ],
            [
                'user_id' => $user->id,
                'name' => 'Bob',
                'weight' => 80
            ]
        ];

        foreach($drivers as $driver){
            Driver::create($driver);
        }

    }
}
