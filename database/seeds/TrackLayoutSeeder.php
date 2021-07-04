<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\TrackLayout;

class TrackLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mpr = DB::table('tracks')->where('name', 'Morgan Park Raceway')->first();
        $mtp = DB::table('tracks')->where('name', 'Mount Panorama')->first();
        $qr = DB::table('tracks')->where('name', 'Queensland Raceway')->first();
        $smp = DB::table('tracks')->where('name', 'Sydney Motorsport Park')->first();


        $trackLayouts = [
            // Morgan Park
            [
                'track_id' => $mpr->id,
                'name' => 'E Track',
                'length' => 5.63,
                'direction_reversed' => false
            ],
            [
                'track_id' => $mpr->id,
                'name' => 'K Track',
                'length' => 8.33,
                'direction_reversed' => false
            ],

            // MT Panorama
            [
                'track_id' => $mtp->id,
                'name' => 'Mount Panorama',
                'length' => 7.44,
                'direction_reversed' => false
            ],

            // Queensland Raceway
            [
                'track_id' => $qr->id,
                'name' => 'National Track',
                'length' => 3.33,
                'direction_reversed' => false
            ],
            [
                'track_id' => $qr->id,
                'name' => 'Sprint',
                'length' => 1.44,
                'direction_reversed' => false
            ],

            // Sydney Motorsport Park
            [
                'track_id' => $smp->id,
                'name' => 'Full Track',
                'length' => 6.44,
                'direction_reversed' => false
            ]

        ];

        foreach($trackLayouts as $trackLayout){
            TrackLayout::create($trackLayout);
        }
    }
}
