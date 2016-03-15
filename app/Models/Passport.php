<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passport extends Model
{


    protected $table = 'passport';

    protected $fillable = [
        'passno', 'date'
    ];

    public function user(){
        $this->hasOne('User', null, 'user_id');
    }
}
