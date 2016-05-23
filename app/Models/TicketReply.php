<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $table = 'ticket_reply';

    protected $fillable = [
        'message_id', 'reply', 'r_uid',
    ];

    public function ticketMessage()
    {
        return $this->belongsTo('App\Models\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function media()
    {
        return $this->hasMany('App\Models\TicketReplyMedia');
    }
}
