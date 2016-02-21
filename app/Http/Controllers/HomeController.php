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

        $this->haveRole = $this->getAllRoles();
       // print_r($this->haveRole);

        return view('home');
    }

    private function getAllRoles()
    {
        $role = new Role();
        $roles = [];

        foreach($role as $r)
        {
            print_r($r);

        }

        return $roles;
    }
}
