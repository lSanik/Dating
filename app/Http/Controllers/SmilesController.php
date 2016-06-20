<?php

namespace App\Http\Controllers;

use App\Models\Smiles;
use Illuminate\Http\Request;

use App\Http\Requests;

class SmilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function sendSmile(Request $request)
    {
        $smile = new Smiles();
        $smile->from = \Auth::user()->id;
        $smile->to   = $request->input('id');
        $smile->save();
        
        return response('Success', 200);
    }
}
