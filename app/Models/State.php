<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name', 'country_id',
    ];

    public function country()
    {
        $this->hasOne('Country');
    }
}
