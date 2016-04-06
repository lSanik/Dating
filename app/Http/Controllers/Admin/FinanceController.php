<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServicesPrice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class FinanceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        //\Auth::user()->hasRole(['Owner']);

        view()->share('heading', 'Finance');
        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function control()
    {
        $plans = ServicesPrice::all();

        return view('admin.finance.control')->with([
            'plans' => $plans
        ]);
    }

    public function saveData(Request $request, $id)
    {
        $fin = ServicesPrice::find($id);
        $fin->price = $request->input('price');
        $fin->save();

        \Session::flash('flash_success', 'Обновлено');
        return redirect('/'.\App::getLocale().'/admin/finance/control');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
