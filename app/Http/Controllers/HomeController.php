<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $girls = User::select(['id', 'first_name', 'avatar'])
                        ->where('role_id', '=', 5)
                        ->where('status_id', '=', 1)
                        ->get();
        
        $topHotGirls = User::select(['id', 'first_name', 'avatar'])
                            ->where('role_id', '=', 5)
                            ->where('status_id', '=', 1)
                            ->where('home', '=', 1)
                            ->get();
        
        return view('client.home')->with([
            'girls'         => $girls,
            'topHotGirls'   => $topHotGirls
        ]);
    }
}
