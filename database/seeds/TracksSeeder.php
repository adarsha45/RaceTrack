<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Track;

class TracksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();

        $tracks = [
            [
                'user_id' => $user->id,
                'name' => 'Morgan Park Raceway',
                'location' => 'QLD'
            ],
            [
                'user_id' => $user->id,
                'name' => 'Queensland Raceway',
                'location' => 'QLD'
            ],
            [
                'user_id' => $user->id,
                'name' => 'Mount Panorama',
                'location' => 'NSW'
            ],
            [
                'user_id' => $user->id,
                'name' => 'Sydney Motorsport Park',
                'location' => 'NSW'
            ]
        ];

        foreach($tracks as $track){
            Track::create($track);
        }
    }
}
