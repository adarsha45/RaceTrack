<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lap extends Model
{
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo('App\Driver', 'driver_id');
    }

    public function trackLayout()
    {
        return $this->belongsTo('App\TrackLayout', 'track_layout_id');
    }

    public function carConfiguration()
    {
        return $this->belongsTo('App\CarConfiguration', 'car_configuration');
    }
}
