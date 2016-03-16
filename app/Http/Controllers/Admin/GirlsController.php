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

    public function __construct(User $user, Profile $profile, Passport $passport)
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
        if( Auth::user()->hasRole('Owner') )
            $girls = User::where('role_id', '=', '5')->get();
        else
            if( Auth::user()->hasRole('Partner') )
                $girls = User::where('role_id', '=', '5')
                                ->where('partner_id', '=', Auth::user()->id)
                                ->get();

        return view('admin.girls.index')->with([
            'heading' => 'Все девушки',
            'girls' => $girls
        ]);
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

        $this->validate($request, [
            'first_name'    => 'required|max:255',
            'second_name'   => 'required|max:255',
            'birthday'      => 'required|date',
            'email'         => 'required|max:128',
            'phone'         => 'required|max:20',
            'password'      => 'required',
            'county'        => 'required',
            'state'         => 'required',
            'city'          => 'required',
            'passno'        => 'required',
            'pass_date'     => 'required|date',
            'pass_photo'    => 'required',
            'height'        => 'numeric',
            'weight'        => 'numeric',
        ]);

        //Проверка паспорта в базе
        $check = $this->passport->where('passno', 'like', str_replace(" ","", $request->input('passno')))->first();

        if( !$check )
        {
            $user_avatar    = 'empty_girl.png';
            $passport_cover = '';

            /** Cech for images */
            if( $request->file('avatar') )
            {
                $file = $request->file('avatar');
                $user_avatar = time() . '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/girls/avatars';
                $file->move($destination, $user_avatar);
            }

            if( $request->input('pass_photo') ){
                $file = $request->file('avatar');
                $passport_cover = time(). '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/girls/passports';
                $file->move($destination, $passport_cover);

                $this->passport->cover = $passport_cover;
            }

            /**
             * Create user with role female/male
             */

            $this->user->avatar         = $user_avatar;
            $this->user->first_name     = $request->input('first_name');
            $this->user->last_name      = $request->input('second_name');
            $this->user->email          = $request->input('email');
            $this->user->phone          = $request->input('phone');
            $this->user->password       = bcrypt( $request->input('password') );
            $this->user->city_id        = $request->input('city');

            $this->user->partner_id     = Auth::user()->id;

            $gender = $request->input('gender');

            /** Проверка пола учасника */
            if( $gender == 'female'){
                $this->user->role_id    = 5;
                $this->user->status_id  = 5;
            } else {
                $this->user->role_id    = 4;
                $this->user->status_id  = 1;
            }

            $this->user->save();

            /**
             *  Add girl passport
             */
            $this->passport->user_id    = $this->user->id;
            $this->passport->passno     = str_replace(" ", "", $request->input('passno'));
            $this->passport->date       = $request->input('pass_date');
            $this->passport->save();
            /**
             * Create girl profile
             */

            $this->profile->user_id           = $this->user->id;
            $this->profile->birthday    = $request->input('birthday');
            $this->profile->height      = $request->input('height');
            $this->profile->weight      = $request->input('weight');

            /** Enums */

            $this->profile->gender      = $request->input('gender');
            $this->profile->eye         = $request->input('eye');
            $this->profile->hair        = $request->input('hair');
            $this->profile->education   = $request->input('education');
            $this->profile->kids        = $request->input('kids');
            $this->profile->want_kids   = $request->input('want_kids');
            $this->profile->religion    = $request->input('religion');
            $this->profile->smoke       = $request->input('smoke');
            $this->profile->drink       = $request->input('drink');
            $this->profile->occupation  = $request->input('occupation');

            $this->profile->save();
        }

        return redirect('/admin/girls');
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
        $user = $this->user->find($id);

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


        return view('admin.girls.edit')->with([
            'heading' => 'Редактировать профиль',
            'user' => $user,
            'selects' => $selects,
        ]);
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
        //@todo Update профиля девушки
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //@todo SoftDelete Row whre ID
    }

    public function getByStatus($status)
    {
        $girls = $this->user->status($status)->get();
        dd($girls);
    }

    /**
     * Check existence of passport in database
     *
     * firstly for ajax request
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function check(Request $request)
    {
        $passp = $this->passport->where('passno', 'like', str_replace(" ","", $request->input('passno')))->first();

        if( $passp )
            return response('<span class="bg-danger">Такой номер пасспорта существует в базе</span>', 200);
        else
            return response('<span class="bg-success">Номер паспорта в базе не обнаружен</span>', 200);
    }

}
