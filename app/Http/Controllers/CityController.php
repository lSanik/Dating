<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

use App\Http\Requests;

class CityController extends Controller
{
    protected $cities;

    public function __construct(City $city)
    {
        $this->cities = $city;
    }

    public function getCityByState(Request $request)
    {
        return $this->cities->where( 'state_id', '=' , $request->input('id') )->get();
    }
}
