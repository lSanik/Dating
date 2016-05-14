<?php

namespace App\Modelss;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    /**
     * @var string
     */
    protected $table = 'chat_rooms';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\ChatMessages', 'chat_id');
    }



}
