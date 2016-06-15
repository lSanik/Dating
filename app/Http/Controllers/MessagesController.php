<?php

namespace App\Http\Controllers;


use App\Models\Expenses;
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

        $from_user = \DB::table('messages')
            ->select('message', 'messages.created_at as time', 'users.first_name as name', 'users.avatar as ava')
            ->join('users', 'users.id', '=', 'messages.from_user')
            ->where('messages.from_user', '=', $id)
            ->where('messages.to_user', '=', \Auth::user()->id)
            ->orderBy('messages.created_at', 'asc')
            ->get();

        $to_user =  \DB::table('messages')
            ->select('message', 'messages.created_at as time', 'users.first_name as name', 'users.avatar as ava')
            ->join('users', 'users.id', '=', 'messages.from_user')
            ->where('messages.from_user', '=', \Auth::user()->id)
            ->where('messages.to_user', '=', $id)
            ->orderBy('messages.created_at', 'asc')
            ->get();

        $messages = array_merge($from_user, $to_user);

        usort($messages, [$this, 'cmp_time']);

        return view('client.profile.messages')->with([
            'messages' => $messages,
            'to' => $id
        ]);
    }

    public function cmp_time($a, $b)
    {
        if($a->time > $b->time)
            return 1;
    }

    public function send(Request $request, $id)
    {
        if( \Auth::user()->hasRole('male') ){
            $money = $this->getMoney();

            if( !($money->amount >= $this->cost) ){
                \Session::flash('flash-warning', trans('payments.enoughMoney'));
                return redirect()->back();
            } else {
                $money->amount -= $this->cost;
                $money->save();

                $exp = new Expenses();
                $exp->user_id = \Auth::user()->id;
                $exp->girl_id = $id;
                $exp->expense = $this->cost;
                $exp->save();
            }
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
            $message->message   = $this->robot( $request->input('message') );
            $message->save();

            return redirect()->back();
        }

        return redirect()->back();
    }


}
