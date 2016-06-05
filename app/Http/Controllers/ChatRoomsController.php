<?php

namespace App\Http\Controllers;

class ChatRoomsController extends Controller
{
    public function index()
    {
        return view('client.chat');
    }
}
