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

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required|max:128',
            'second_name'   => 'required|max:128',
            'birthday'      => 'required|date_format:dd/mm/Y',
            'email'         => 'required',
            'phone'         => 'required',
            'password'      => 'required'
        ]);

        $this->user->email      = $request->input('email');
        $this->user->phone      = $request->input('phone');
        $this->user->first_name = $request->input('first_name');
        $this->user->last_name  = $request->input('second_name');
        $this->user->password   = bcrypt($request->input('password'));
        $this->user->avatar     = $request->input('avatar');
        $this->user->status_id  = 1;
        $this->user->role_id    = 4;
        $this->user->city_id    = $request->input('city');
        $this->user->state_id   = $request->input('state');
        $this->user->country_id = $request->input('country');

        $this->user->save();

        $this->profile->user_id = $this->user->id;
        $this->profile->gender  = 'male';
        $this->profile->save();

        Auth::login($this->user);
        
        return redirect('home');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
