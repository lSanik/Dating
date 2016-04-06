<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getUnreadMessages()
    {
        return \App\Models\Ticket::unread();
    }


    public static function getUnreadMessagesCount()
    {
        return \App\Models\Ticket::unreadCount();
    }
}
