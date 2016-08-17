<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (!\Auth::user() || \Auth::user()->hasRole('Male') || \Auth::user()->hasRole('Alien')) {
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
    
    private function getHotUsers($roleId)
    {
        return User::select(['id', 'first_name', 'avatar', 'webcam'])
            ->where('role_id', '=', $roleId)
            ->where('status_id', '=', 1)
            ->where('hot', '=', 1)
            ->get();
    }
}
