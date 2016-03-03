<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Passport;
use App\Models\Profile;
use App\Models\User;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class GirlsController extends Controller
{

    private $user;
    private $profile;
    private $passport;

    public function __construct(Passport $passport, Profile $profile, User $user)
    {
        $this->user = $user;
        $this->profile = $profile;
        $this->passport = $passport;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.girls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'drink'     => $this->profile->getEnum('drink')
        ];

        $countries = Country::all();


        return view('admin.girls.create')->with([
            'heading' => 'Добавить девушку',
            'selects' => $selects,
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !$this->check( $request->input('passno') ) )
        {
            /**
             * Create user with role female
             */
            $user = new User();

            $user->first_name   = $request->input('first_name');
            $user->last_name  = $request->input('second_name');
            $user->email        = $request->input('email');
            $user->phone        = $request->input('phone');
            $user->password     = bcrypt( $request->input('password') );
            $user->role_id      = 5;
            $user->city_id      = $request->input('city');
            $user->status_id    = 5;
            $user->partner_id   = Auth::user()->id;

            $id = $user->save();
            unset($user);


            /**
             * Add girl passport
             */
            $passport = new Passport();

            $passport->user_id  = $id;
            $passport->passno   = $request->input('passno');
            $passport->date     = $request->input('pass_date');

            $passport->save();
            unset($passport);

            /**
             * Add girl profile
             */
            $profile = new Profile();

            $profile->user_id       = $id;

            $profile->birthday      = $request->input('birthday');
            $profile->height        = $request->input('height');
            $profile->weight        = $request->input('weight');

            /** Enums gender */
            $profile->gender        = $request->input('gender');
            $profile->eye           = $request->input('eye');
            $profile->hair          = $request->input('hair');
            $profile->education     = $request->input('education');
            $profile->kids          = $request->input('kids');
            $profile->want_kids     = $request->input('want_kids');
            $profile->religion      = $request->input('religion');
            $profile->smoke         = $request->input('smoke');
            $profile->drink         = $request->input('drink');
            $profile->occupation    = $request->input('occupation');

            $profile->save();
            unset($profile);

            //@todo прописать if на возможные незаполненные поля.
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.girls.girl');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.girls.edit');
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

    public function getByStatus($status)
    {
        return $status;
    }

    public function check($passno)
    {
        $passport = $this->passport->where( 'passno', '=', $passno )->get();



        return False;

    }


}
