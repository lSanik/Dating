<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\ChatContactList;
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
        $contact_lists = ChatContactList::where('user_id','=',\Auth::user()->id)->get();
        $user_contact_list_data=array();
        foreach ($contact_lists as $contact_list){
            $user_contact_list_data[]=User::getUserShtInfo($contact_list['contact_id']);
        }
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
            'user_contact_list_data' =>$user_contact_list_data,
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function sendMessage(Request $request)
    {
        $redis = LRedis::connection();
        $data = [
            'message' => $request->input('message'),
            'user' => $request->input('user')
        ];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function ajax(Request $request){
        if( $request->input('refresh_contact_list') != null ){

            $user = User::find(\Auth::user()->id);
            $contact_lists = ChatContactList::where('user_id','=',\Auth::user()->id)->get();
            $user_contact_list_data=array();
            foreach ($contact_lists as $contact_list){
                $user_contact_list_data[]=User::getUserShtInfo($contact_list['contact_id']);
            }
            return view('client.contact_list')->with([
            'user_contact_list_data' =>$user_contact_list_data,
                ]);
        }
    }
}
