<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageSender extends Model
{
    protected $table = 'message_sender';
    protected $fillable = [
        'id',
        'girl_id',
        'title',
        'body',
        'filter_data',
        'status',
        'webcam'
    ];
}
