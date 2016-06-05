<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
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
        $pages = DB::table('pages')->select('pages.id', 'slug', 'title')
            ->join('pages_translations', 'pages.id', '=', 'pages_translations.pages_id')
            ->where('pages_translations.locale', '=', App::getLocale())
            ->get();

        view()->share('pages', $pages); //pages links at all front
        
    }

    /** Admin tickets */

    public static function getUnreadMessages()
    {
        return \App\Models\Ticket::unread();
    }

    public static function getUnreadMessagesCount()
    {
        return \App\Models\Ticket::unreadCount();
    }

    /** Contact form */

    public static function getContactMessages()
    {
        return \App\Models\ContacMessages::unread();
    }

    public static function getContactUnread()
    {
        return \App\Models\ContacMessages::unreadCount();
    }

    /**
     * Remove email address, phone number, links from message
     *
     * @param $message string
     * @return mixed string
     */
    public function robot($message)
    {
        $email_pattern = '/[^@\s]*@[^@\s]*\.[^@\s]*/';
        $links_pattern = '/[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+/i';

        $phone_pattern = [
            '!(\b\+?[0-9()\[\]./ -]{7,17}\b|\b\+?[0-9()\[\]./ -]{7,17}\s+(extension|x|#|-|code|ext)\s+[0-9]{1,6})!i',
        ];

        $replace = ' [removed] ';

        $message = preg_replace($email_pattern, $replace, $message);
        $message = preg_replace($links_pattern, $replace, $message);

        foreach ($phone_pattern as $p){
            $message = preg_replace($p, $replace, $message);
        }

        return $message;
    }

    /**
     * Remove file from storage
     *
     * @param $file string
     * @return bool
     */
    public function removeFile($file)
    {
        if (is_file($file)) {
            return unlink($file);
        } else {
            return;
        }
    }

    /**
     * Get users money
     */
    public function getMoney()
    {
        if(\Auth::user() && \Auth::user()->hasRole('male')){
            return \App\Models\Finance::where('user_id', '=', \Auth::user()->id)->get();
        } else
            return;
    }

    /** Get horoscope */
    public function getHoroscope()
    {
        //todo get
    }
}
