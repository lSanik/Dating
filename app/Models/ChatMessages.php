<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    /**
     * @var string
     */
    protected $table = 'chat_messages';

    /**
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chatRoom()
    {
        return $this->belongsTo('App\Models\ChatRoom', 'chat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
