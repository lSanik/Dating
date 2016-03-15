<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Ticket;
use App\Models\TicketData;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class TicketController extends Controller
{
    //@todo Пересмотреть логику работы
    private $ticket;
    private $tData;

    public function __construct(Ticket $ticket, TicketData $tData)
    {
        $this->ticket = $ticket;
        $this->tData = $tData;
    }

    public function index()
    {

        $selects = [
            'subject' => $this->ticket->getEnum('subject'),
        ];

        $tickets = $this->ticket->all();

        return view('admin.ticket.new')->with([
            'heading' => 'Новое сообещние администратору/модератору',
            'selects' => $selects,
            'tickets' => $tickets,
        ]);

    }


    public function show($id)
    {
        $messages = $this->ticket->find($id)->messages();

        foreach($messages as $message)
        {
            print_r($message);
        }

        /*return view('admin.ticket.show')->with([
            'heading' => 'Ticket #'.$id,
            'messages' => $messages,
        ]); */
    }

    public function create(Request $request)
    {
        $this->ticket->subject = $request->input('subjects');
        $this->ticket->status = 'wait';
        $this->ticket->viewed = '0';

        $id = $this->ticket->save();

        $this->tData->t_id = $id;
        $this->tData->subject = $request->input('subject');
        $this->tData->message = $request->input('message');
        $this->tData->u_id = Auth::user()->id;

        $this->tData->save();

        return redirect('/admin/support');
    }

    public function answer(Request $request, $id)
    {
        //add new answer to ticket
    }
}
