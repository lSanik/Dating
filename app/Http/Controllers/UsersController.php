<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Country;
use App\Models\Messages;
use App\Models\Profile;
use App\Models\Session;
use App\Models\Smiles;
use App\Models\State;
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
                'users.webcam',
                'profile.*',
                'countries.name as country',
                'cities.name as city')
            ->join('profile', 'profile.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->where('users.id', '=', $id)
            ->get();

        $albus = Album::where('user_id', '=', $id)->get();

        return view('client.profile.show')->with([
            'user'      => $user,
            'albums'    => $albus,
            'id'        => $id
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
        if(\Auth::user()->id == $id){
            $selects = [
                'gender'    => $this->profile->getEnum('gender'),
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


            return view('client.profile.edit')->with([
                'user'      => $this->user->find($id),
                'selects'   => $selects,
                'countries' => Country::all(),
                'states'    => State::all(),
                'id'        => $id,
            ]);
        } else
            return redirect('/'.\App::getLocale().'/profile/show/'.$id);
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
        $albums = Album::where('user_id', '=', $id)->get();

        return view('client.profile.photos')->with([
            'albums' => $albums,
            'id' => $id,
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
        $from = \DB::table('messages')
            ->select('messages.id as mid', 'messages.message', 'users.id as uid', 'users.first_name', 'users.avatar')
            ->join('users', 'users.id', '=', 'messages.to_user')
            ->where('messages.from_user', '=', \Auth::user()->id)
            ->paginate(30);

        $to = \DB::table('messages')
            ->select('messages.id as mid', 'messages.message', 'users.id as uid', 'users.first_name', 'users.avatar')
            ->join('users', 'users.id', '=', 'messages.from_user')
            ->where('messages.to_user', '=', \Auth::user()->id)
            ->paginate(30);

        return view('client.profile.mail')->with([
            'from'   =>  $from,
            'to'    => $to
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
        $smiles = \DB::table('smiles')
            ->select('users.id', 'users.first_name')
            ->join('users', 'users.id', '=', 'smiles.from')
            ->where('smiles.to', '=', $id)
            ->get();

        return view('client.profile.smiles')->with([
            'smiles' => $smiles
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
        $this->validate($request, [
            'avatar' => 'required',
            'first_name' => 'required',
            'second_name'  => 'required',
            'email'      => 'required',
        ]);

        dump($request->input());

        $user = User::find($id);

        if ( $request->file('avatar') ) {
            $user->avatar = $this->upload($request->file('avatar'));
        }

        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('second_name');
        $user->email      = $request->input('email');

        if(!empty($request->input('password')))
            $user->password   = bcrypt( $request->input('password'));

        $user->phone      = $request->input('phone');
        $user->country_id = $request->input('county');
        $user->state_id   = $request->input('state');
        $user->city_id    = $request->input('city');

        $user->save();

        if( empty(Profile::where('user_id', '=', $id)->get()->items) ){

            $profile = new Profile();
            $profile->user_id   = $id;
            $profile->gender    = $request->input('gender');
            $profile->birthday   = new \DateTime($request->input('birthday'));  //check age
            $profile->height    = $request->input('height');
            $profile->weight   = $request->input('weight');
            $profile->eye       = $request->input('eye');
            $profile->hair      = $request->input('hair');
            $profile->education = $request->input('education');
            $profile->kids      = $request->input('kids');
            $profile->want_kids = $request->input('want_kids');
            $profile->family    = $request->input('family');
            $profile->religion  = $request->input('religion');
            $profile->smoke     = $request->input('smoke');
            $profile->drink     = $request->input('drink');
            $profile->occupation= $request->input('occupation');
            $profile->about     = $request->input('about');
            $profile->looking   = $request->input('looking');
            $profile->l_age_start   = $request->input('l_age_start');
            $profile->l_age_stop    = $request->input('l_age_stop');
            $profile->save();

            return redirect('/'.\App::getLocale().'/profile/show/'.$id);
        } else {

            $profile = Profile::find($id);
            $profile->user_id   = $id;
            $profile->gender    = $request->input('gender');
            $profile->birthday  = new \DateTime($request->input('birthday'));  //check age
            $profile->height    = $request->input('height');
            $profile->weight    = $request->input('weight');
            $profile->eye       = $request->input('eye');
            $profile->hair      = $request->input('hair');
            $profile->education = $request->input('education');
            $profile->kids      = $request->input('kids');
            $profile->want_kids = $request->input('want_kids');
            $profile->family    = $request->input('family');
            $profile->religion  = $request->input('religion');
            $profile->smoke     = $request->input('smoke');
            $profile->drink     = $request->input('drink');
            $profile->occupation = $request->input('occupation');
            $profile->about     = $request->input('about');
            $profile->looking   = $request->input('looking');
            $profile->l_age_start = $request->input('l_age_start');
            $profile->l_age_stop = $request->input('l_age_stop');
            $profile->save();

        }
    }
}
