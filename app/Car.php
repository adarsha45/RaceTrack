<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    // We don't need the create_at or updated_at columns.
    public $timestamps = false;

    public function configurations()
    {
        return $this->hasMany('App\CarConfiguration');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
