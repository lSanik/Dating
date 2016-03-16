<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Presents;
use App\Models\PresentsTranslation;

use App\Http\Requests;

class PresentsController extends Controller
{
    private $present;

    public function __construct(Presents $present)
    {
        $this->present = $present;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presents = $this->present->all();

        return view('admin.presents')->with([
            'heading'  => 'Подарки',
            'presents' => $presents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.presents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->input());
        dd($request->file());
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
        $present = $this->present->first($id);

        return view('admin.present.edit')->with([
            'heading' => 'Редактировать подарок',
            'present' => $present
        ]);
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
    public function destroy($id)
    {
        //
    }
}
