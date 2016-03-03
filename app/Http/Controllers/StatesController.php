<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\State;

class StatesController extends Controller
{
    private $states;

    public function __construct(State $states)
    {
        $this->states = $states;
    }

    public function statesByCountry(Request $request)
    {
        return $this->states->where( 'country_id', '=', $request->input('id') )->get();
    }
}
