<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class Track extends model
{
    //
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function trackLayouts()
    {
        return $this->hasMany('App\TrackLayout');
    }
}
