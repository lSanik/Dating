<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(\Auth::user()->id);

        if (!\Auth::user()
            || \Auth::user()->hasRole('Male')
            || \Auth::user()->hasRole('Alien')
        ){
            $users = $this->getUsers(5);
        } else {
            $users = $this->getUsers(4);
        }

        return view('client.chat')->with([
            'user'  => $user,
            'users' => $users,
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sendMessage(Request $request)
    {
        $redis = LRedis::connection();
        $data = ['message' => $request->input('message'), 'user' => $request->input('user')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }
}
