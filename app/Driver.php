<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //By default laravel will expect created_at & updated_at column in your table.
    // By making it to false it will override the default setting.
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function laps()
    {
        return $this->hasMany('App\Lap');
    }
}
