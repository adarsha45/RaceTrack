<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarConfiguration extends Model
{
    public function car()
    {
        return $this->belongsTo('App\Car', 'car_id');
    }

    public function laps()
    {
        return $this->hasMany('App\Lap');
    }
}
