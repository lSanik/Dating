<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Doctrine\Common\Annotations\Annotation\Required;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $user;
    private $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('client.profile.show')->with([

        ]);
    }

    /**
     * Show the form for editing the profile.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {

        return view('client.profile.profile')->with([
            'user' => $this->user->find($id),

        ]);
    }

    /**
     * Show the users photo albums and editing actions
     *
     * @param int $id
     * @return mixed
     */
    public function profilePhoto(int $id)
    {

        return view('client.profile.photos')->with([

        ]);
    }

    /**
     * Show the users videos and editing actions
     *
     * @param int $id
     * @return mixed
     */
    public function profileVideo(int $id)
    {

        return view('client.profile.video')->with([

        ]);
    }

    /**
     * Show users income messages
     *
     * @param int $id
     * @return mixed
     */
    public function profileMail(int $id)
    {
        return view('client.profile.mail')->with([

        ]);
    }


    /**
     * Show users income smiles
     *
     * @param int $id
     * @return mixed
     */
    public function profileSmiles(int $id)
    {
        return view('client.profile.smiles')->with([

        ]);
    }

    /**
     * Show users income gifts
     *
     * @param int $id
     * @return mixed1
     */
    public function profileGifts($id)
    {
        return view('client.profile.gifts')->with([

        ]);
    }

    /**
     * Show users finance statistic
     *
     * @param int $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
