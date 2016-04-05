<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketSubjects extends Model
{
    protected $table = 'ticket_subjects';

    protected $fillable = ['name'];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }

}
