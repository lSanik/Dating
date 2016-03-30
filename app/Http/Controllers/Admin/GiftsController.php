<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Presents;
use App\Models\PresentsTranslation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GiftsController extends Controller
{
    private $present;
    private $pt;
    private $user;

    public function __construct(Presents $present, User $user, PresentsTranslation $pt)
    {
        $this->present = $present;
        $this->user = $user;
        $this->pt = $pt;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presents = $this->present->getAll();

        return view('admin.presents.index')->with([
            'heading'  => 'Подарки',
            'presents' => $presents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heading = 'Добавить подарок';

        return view('admin.presents.create')->with([
            'heading' => $heading
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required',
            'title' => 'required|max:255',
            'price' => 'required'
        ]);

        if( $request->file('image') )
        {
            $present_file = time() . '-' . $request->file('image')->getClientOriginalName();
            $destination  = public_path() . '/uploads/presents/';
            $request->file('image')->move( $destination, $present_file );

            $this->present->image = $present_file;
        }

        $this->present->price = (double) $request->input('price');
        $this->present->partner_id = \Auth::user()->id;
        $this->present->save();


        $this->pt->present_id = $this->present->id;
        $this->pt->locale = $request->input('lang');
        $this->pt->title = $request->input('title');
        $this->pt->description = $request->input('description');
        $this->pt->save();

        \Session::flash('flash_success', 'Подарок добавлен');

        return redirect('/admin/gifts');
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

        $present = $this->present->where('id', '=', $id)->first();
        $present_locale = $this->pt->where('present_id', '=', $id)->first();


        return view('admin.presents.edit')->with([
            'heading' => 'Редактировать подарок',
            'present' => $present,
            'loc'  => $present_locale
        ]);
    }

    public function check_language(Request $request)
    {
        $response = $this->pt->where('present_id', '=',  $request->input('id') )
                             ->where('locale', '=', $request->input('code'))
                             ->first();

        return $response;
    }

    public function save_present_translation(Request $request)
    {

        $check = $this->pt->where('present_id', '=', $request->input('present_id'))
                             ->where('locale', '=', $request->input('locale'))
                             ->first();

        if( $check )
            return "False";
        else {
            $this->pt->insert([
                'present_id' => $request->input('present_id'),
                'locale' => $request->input('locale'),
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);
        }

        return "True";

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
        dd($request->input());
        dd($request->file());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drop($id)
    {
        return redirect('/admin/gifts/');
    }
}
