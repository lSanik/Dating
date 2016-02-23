<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'city', 'country_id'
    ];

    public function Countries()
    {
        return $this->hasMany('App\Country', 'country_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User','city_id');
    }
}
