<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MessageSender extends Model
{
    protected $table = 'message_sender';

    protected $fillable = [

        'girl_id',
        'title',
        'body',
        'filter_data',
        'status',
        'mans_id'
    ];
    public function get_man_list($filter_data)
    {
        return Cache::has('user-is-online-'.$this->id);
    }
}
