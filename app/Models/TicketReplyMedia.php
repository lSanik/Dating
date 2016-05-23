<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketReplyMedia extends Model
{
    protected $table = 't_reply_media';

    protected $fillable = [
        'message_id', 'value',
    ];

    public function reply()
    {
        return $this->belongsTo('App\Models\TicketReply');
    }
}
