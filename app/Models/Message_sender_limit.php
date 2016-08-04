<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Message_sender_limit extends Model
{
    protected $table = 'message_sender_limit';
    protected $fillable = [
        'user_id',
        'count',
        'created_at',
    ];
    static function get_day_count($user_id)
    {
        $query_result=self::select('count')
            ->where('user_id', '=', $user_id)
            ->whereRaw('`created_at` > NOW() - INTERVAL 1 DAY')
            ->get();
        $sum=0;
        foreach($query_result as $result){
            $sum=$sum+$result->count;
        }
       return $sum;
    }
    static function add_day_count($user_id,$count)
    {
        $day_count= new Message_sender_limit();
        $day_count->user_id=$user_id;
        $day_count->count=$count;
        $day_count->save();
            /*   return self::select('count')
           ->where('user_id', '=', $user_id)
           ->where('created_at','>', 'NOW() - INTERVAL 1 DAY')
           ->get();*/
    }
}
