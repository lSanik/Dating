<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiketMessageMedia extends Model
{
    protected $table = 't_message_media';

    protected $fillable = [
        'reply_id', 'value',
    ];

    public function message()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}
