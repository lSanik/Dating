<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $user;
    private $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
        parent::__construct();
    }

    public function show($id)
    {
        $user = \DB::table('users')
            ->select(
                'users.id as uid',
                'users.first_name',
                'users.last_name',
                'users.email',
                'users.avatar',
                'profile.*',
                'countries.name as country',
                'cities.name as city')
            ->join('profile', 'users.id', '=', 'profile.user_id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->where('users.id', '=', $id)
            ->get();

        return view('client.profile.show')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the profile.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('client.profile.profile')->with([
            'user' => $this->user->find($id),

        ]);
    }

    public function online()
    {
        if (\Auth::user()->hasRole('male')) {
            $users = User::where('role_id', '=', 5)->paginate(20);
        } else {
            $users = User::where('role_id', '=', 4)->paginate(20);
        }

        return view('client.profile.users')->with([
           'users' => $users,
        ]);
    }

    /**
     * Show the users photo albums and editing actions.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function profilePhoto(int $id)
    {
        return view('client.profile.photos')->with([

        ]);
    }

    /**
     * Show the users videos and editing actions.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function profileVideo(int $id)
    {
        return view('client.profile.video')->with([

        ]);
    }

    /**
     * Show users income messages.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function profileMail(int $id)
    {
        $dialogs = \DB::table('messages')
            ->select('messages.id', 'messages.message', 'users.id as uid', 'users.first_name', 'users.avatar')
            ->join('users', 'users.id', '=', 'messages.from_user')
            ->where('to_user', '=', $id)
            ->paginate(30);


        return view('client.profile.mail')->with([
            'dialogs' => $dialogs
        ]);
    }

    /**
     * Show users income smiles.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function profileSmiles(int $id)
    {
        return view('client.profile.smiles')->with([

        ]);
    }

    /**
     * Show users income gifts.
     *
     * @param int $id
     *
     * @return mixed1
     */
    public function profileGifts($id)
    {
        return view('client.profile.gifts')->with([

        ]);
    }

    /**
     * Show users finance statistic.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function profileFinance($id)
    {
        return view('client.profile.finance')->with([

        ]);
    }

    /**
     * Update the user profile in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
