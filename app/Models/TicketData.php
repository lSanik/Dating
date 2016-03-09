<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketData extends Model
{
    protected $table = 'ticket_datas';

    protected $fillable = [

    ];

    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'id', 't_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
