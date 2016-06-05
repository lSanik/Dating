<?php

namespace App\Http\Controllers;

use App\Models\ServicesPrice;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Messages;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{

    private $cost;

    public function __construct()
    {
        
        $cost = ServicesPrice::select('price')
            ->where('name', 'like', 'message')->first();

        $this->cost = $cost->price;

        
        parent::__construct();
    }

    public function index($id){

        $messages = Messages::select('message')
            ->where('from_user', '=', \Auth::user()->id)
            ->where('to_user', '=', $id)
            ->get();

        return view('client.profile.messages')->with([
            'messages' => $messages,
            'to' => $id
        ]);
    }

    public function send(Request $request, $id)
    {
        if( \Auth::user()->hasRole('male') ){
            $money = $this->getMoney();

            dd($money);

            return redirect()->back();
        }

        if($request->input('to') == $id){

            $rules = [
                'to'        => 'required',
                'from'      => 'required',
                'message'   => 'required',
            ];

            $v = Validator::make($request->all(), $rules);

            if($v->fails())
            {
                return redirect()->back()->withErrors($v->errors());
            }


            $message = new Messages();
            $message->from_user = $request->input('from');
            $message->to_user   = $request->input('to');
            $message->message   = $request->input('message');
            $message->save();

            return redirect()->back();
        }

        return redirect()->back();
    }
}
