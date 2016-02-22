<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


use App\Role;

class HomeController extends Controller
{
    public $haveRole;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


}
