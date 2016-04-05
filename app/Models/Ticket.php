<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket_messages';

    protected $fillable = [
        'from', 'subjects',
        'subject', 'message', 'status',
    ];

    public function subjects()
    {
        return $this->hasOne('App\Models\TicketSubjects');
    }

    public function reply()
    {
        return $this->hasMany('App\Models\TicketReply');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function unreadCount()
    {

    }

    public static function unread()
    {

    }

}
