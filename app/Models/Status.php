<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'name', 'desription'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'status_id');
    }
}
