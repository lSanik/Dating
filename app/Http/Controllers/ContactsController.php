<?php

namespace App\Http\Controllers;

use App\Models\ContactMessages;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function show()
    {
        return view('client.contacts');
    }

    public function sendMessage(Request $request)
    {
        $rules = [
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required'
        ];

        $v = Validator::make($request->all(), $rules);

        if($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        
        $message = new ContactMessages();
        $message->name      = $request->input('name');
        $message->email     = $request->input('email');
        $message->subject   = $request->input('subject');
        $message->message   = $request->input('message');
        $message->flag      = 1;
        $message->save();

        //@todo send email to admin
        \Session::flash('success_message', trans('contacts.success'));
        return redirect( url('/'.\App::getLocale().'/contacts') );

    }

    public function showUnreaded()
    {
        $messages = ContactMessages::where('flag', '=', 1)->get();
        return view('admin.contacts.unread')->with([
           'messages'   => $messages
        ]);
    }
}
