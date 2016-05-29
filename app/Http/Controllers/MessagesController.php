<?php

namespace App\Http\Controllers;

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
        parent::__construct();
    }

    public function index($id){

        $from = \Auth::user();
        $to = User::select('id', 'first_name')->where('id', '=', $id)->get();

        if( \Auth::user()->hasRole('male') ){
            
        }


        return view('client.profile.messages')->with([

        ]);
    }

    public function send(Request $request, $id)
    {
        $rules = [
            'from'      => 'required',
            'message'   => 'required',
        ];
        
        $v = Validator::make($request->all(), $rules);

        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }


        

    }
}
