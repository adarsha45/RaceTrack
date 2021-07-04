<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackLayout extends Model
{
    public function track()
    {
        return $this->belongsTo('App\Track', 'track_id');
    }

    public function laps()
    {
        return $this->hasMany('App\Lap');
    }
}
