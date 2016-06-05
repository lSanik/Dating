<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Horoscope;
use App\Models\HoroscopeTranslate;
use Illuminate\Http\Request;

use App\Http\Requests;

class HoroscopeController extends Controller
{
    //todo Refactor this shit

    private $horoscope;
    private $h = [];

    public function __construct()
    {
        $this->horoscope = \DB::table('hdate')->select('id', 'name')->get();

        foreach($this->horoscope as $hp){
            $this->h[$hp->id] = $hp->name;
        }

        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
        view()->share('unread_contact_count', parent::getContactUnread());
        view()->share('unread_contact_message', parent::getContactMessages());
    }

    public function index()
    {
        $compare = Horoscope::all();

        return view('admin.horoscope')->with([
            'heading'   => trans('horoscope.horoscope'),
            'horoscope' => $this->h,
            'compare'   => $compare
        ]);
    }

    public function create()
    {
        return view('admin.horoscope.add')->with([
            'heading'   => trans('horoscope.add'),
            'horoscope' => $this->horoscope
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'start' => 'required|integer',
            'stop'  => 'required|integer',
            'locale'=> 'required',
            'text'  => 'required'
        ]);

        $horoscope = new Horoscope();
        $horoscope->primary   = $request->input('start');
        $horoscope->secondary = $request->input('stop');
        $horoscope->save();
        
        $trans = new HoroscopeTranslate();
        $trans->compare = $horoscope->id;
        $trans->text    = $request->input('text');
        $trans->locale  = $request->input('locale');
        $trans->save();

        foreach (\Config::get('app.locales') as $l) {
            if($l !== $request->input('locale')){
                $trans->insert([
                    'compare' => $horoscope->id,
                    'text'    => '',
                    'locale'  => $l
                ]);
            }
        }

        \Session::flash('flash_success', trans('horoscope.addSuccess'));
        return redirect(\App::getLocale().'/admin/horoscope');

    }

    public function edit($id)
    {

        $hor = Horoscope::find($id);
        $trans = HoroscopeTranslate::where('compare', '=', $id)->get();

        return view('admin.horoscope.edit')->with([
            'heading'    => trans('horoscope.edit'),
            'horoscope'  => $this->h,
            'hor'        => $hor,
            'trans'      => $trans,
            'id'         => $id
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text'      => 'required',
            'locale'    => 'required',
            'row'       => 'required|integer',
        ]);

        $ht = HoroscopeTranslate::find($request->input('row'));

        $ht->text = $request->input('text');

        if( $ht->save() ){
            \Session::flash('flash_success', trans('horoscope.updSuccess'));
            return redirect()->back();

        }


        \Session::flash('flash_error', trans('horoscope.updError'));
        return redirect()->back();
    }

}
