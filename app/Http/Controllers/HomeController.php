<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if( !\Auth::user() || \Auth::user()->hasRole('Male') || \Auth::user()->hasRole('Alien') ){
            $users = $this->getUsers(5);
            $topHot = $this->getHotUsers(5);
        } else {
            $users = $this->getUsers(4);
            $topHot = $this->getHotUsers(4);
        }

        return view('client.home')->with([
            'users'    => $users,
            'topHot'   => $topHot,

        ]);
    }


    private function getUsers($roleId)
    {
        return User::select(['id', 'first_name', 'avatar'])
            ->where('role_id', '=', $roleId)
            ->where('status_id', '=', 1)
            ->get();
    }

    private function getHotUsers($roleId)
    {
        return User::select(['id', 'first_name', 'avatar'])
            ->where('role_id', '=', $roleId)
            ->where('status_id', '=', 1)
            ->where('home', '=', 1)
            ->get();
    }


}
