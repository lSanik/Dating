<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expanses';


    public function whoPay()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

    public function whomPay()
    {
        return $this->belongsTo('App\Models\Users', 'girl_id');
    }
}
