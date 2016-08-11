<?php
/**
 * Created by PhpStorm.
 * User: Oleh Hrebeniuk
 * Date: 08.08.2016
 * Time: 22:09
 */

namespace App;

class Constants
{
    const EXP_MESSAGE = 'message';
    const EXP_CHAT = 'chat';
    const EXP_VIDEO = 'video';
    const EXP_ALBUM = 'photo_album';
    const EXP_CALL = 'call';
    const EXP_FLP = 'flp';
    const EXP_FLE = 'fle';
    const EXP_HOROSCOPE = 'horoscope';

    private static $EXP_TYPES = [
        'message', 'chat', 'video',
        'girl_video', 'call', 'flp', 'fle', 'horoscope',
    ];

    /**
     * @return array
     */
    public static function getExpTypes()
    {
        return self::$EXP_TYPES;
    }
}