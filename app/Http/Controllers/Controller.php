<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $pages = DB::table('pages')->select('pages.id', 'slug','title')
            ->join('pages_translations', 'pages.id', '=', 'pages_translations.pages_id')
            ->where('pages_translations.locale', '=', App::getLocale())
            ->get();

        view()->share('pages', $pages);
    }

    public static function getUnreadMessages()
    {
        return \App\Models\Ticket::unread();
    }

    public static function getUnreadMessagesCount()
    {
        return \App\Models\Ticket::unreadCount();
    }

    /**
     * @param $file string
     *
     * @return boolean
     */
    public function removeFile($file)
    {
        if( is_file($file) )
            return unlink($file);
        else
            return;
    }



}
