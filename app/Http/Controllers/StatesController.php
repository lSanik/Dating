<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    private $states;

    public function __construct(State $states)
    {
        $this->states = $states;
    }

    public function statesByCountry(Request $request)
    {
        return $this->states->where('country_id', '=', $request->input('id'))->get();
    }
}
