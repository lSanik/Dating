<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContacMessages extends Model
{
    protected $table = 'contact_messages';

    public static function unreadCount()
    {
        return self::where('flag', '=', 1)->count();
    }

    public static function unread()
    {
        return self::select('name', 'subject')->where('flag', '=', 1)->get();
    }
}
