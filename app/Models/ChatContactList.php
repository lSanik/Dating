<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatContactList extends Model
{

    protected $table = 'chat_contact_list';
    protected $fillable = [
        'user_id', 'contact_id','status'
    ];

}