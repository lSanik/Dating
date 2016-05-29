<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $users;
    private $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->users = $user->paginate(20);
        $this->profile = new Profile();
        parent::__construct();
    }

    public function index()
    {
        $selects = [
            'eye'       => $this->profile->getEnum('eye'),
            'hair'      => $this->profile->getEnum('hair'),
            'education' => $this->profile->getEnum('education'),
            'kids'      => $this->profile->getEnum('kids'),
            'want_k'    => $this->profile->getEnum('want_kids'),
            'family'    => $this->profile->getEnum('family'),
            'religion'  => $this->profile->getEnum('religion'),
            'smoke'     => $this->profile->getEnum('smoke'),
            'drink'     => $this->profile->getEnum('drink'),
        ];

        if(\Auth::user() && \Auth::user()->hasRole('female')){
            $users = User::where('role_id', '=', '4')->paginate(10);
        } else {
            $users = User::where('role_id', '=', '5')->paginate(10);
        }

        return view('client.search')->with([
            'selects'   => $selects,
            'users'     => $users
        ]);
    }

    public function search(Request $request)
    {
        dump($request->input());
    }
}
