<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = [
        'id', 'sortname', 'name'
    ];


    protected function states()
    {
        $this->hasMany('State');
    }

}
