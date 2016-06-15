<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expenses';

    public function whoPay()
    {
        return $this->belongsTo('App\Models\Users', 'user_id');
    }

    public function whomPay()
    {
        return $this->belongsTo('App\Models\Users', 'girl_id');
    }
}
