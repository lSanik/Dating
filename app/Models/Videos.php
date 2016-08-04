<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
