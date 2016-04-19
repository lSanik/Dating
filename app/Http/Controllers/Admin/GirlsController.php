<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ticket;
use App\Models\Passport;
use App\Models\Profile;
use App\Models\ProfileMedia;
use App\Models\User;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;


//@todo refactor this shit
class GirlsController extends Controller
{

    private $user;
    private $profile;
    private $passport;
    private $passport_photos = [];

    public function __construct(User $user, Profile $profile, Passport $passport)
    {
        $this->middleware('auth');
        Auth::user()->hasRole(['Owner', 'Moder', 'Partner']);

        $this->user = $user;
        $this->profile = $profile;
        $this->passport = $passport;

        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
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

        return view('admin.profile.girls.index')->with([
            'heading' => 'Все девушки',
            'girls' => $girls,
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

        return view('admin.profile.girls.create')->with([
            'heading' => 'Добавить девушку',
            'selects' => $selects,
            'countries' => $countries,
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

        //dd($request->input());

        //Проверка паспорта в базе
        $check = $this->passport->where('passno', 'like', str_replace(" ","", $request->input('passno')))->first();

        if( !$check )
        {

           if( $this->age( $request->input('birthday') ) < 18 )
           {
               \Session::flash('flash_error', 'Девушка младше 18');
               return redirect(\App::getLocale().'/admin/girl/new');
           }

            $user_avatar    = 'empty_girl.png';

            if( $request->file('avatar') )
            {
                $file = $request->file('avatar');
                $user_avatar = time() . '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/girls/avatars';
                $file->move($destination, $user_avatar);
            }

            foreach ($request->allFiles()['pass_photo'] as $file) {
                $pass = time(). '-' . $file->getClientOriginalName();
                $destination = public_path() . '/uploads/girls/passports';
                $file->move($destination, $pass);
                array_push($this->passport_photos, $pass);
            }

            /*
             * Create user with role female/male
             *
             */

            $this->user->avatar         = $user_avatar;
            $this->user->first_name     = $request->input('first_name');
            $this->user->last_name      = $request->input('second_name');
            $this->user->email          = $request->input('email');
            $this->user->phone          = $request->input('phone');
            $this->user->password       = bcrypt( $request->input('password') );

            $this->user->country_id     = $request->input('county');
            $this->user->state_id       = $request->input('state');
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
            $this->passport->date       = Carbon::createFromFormat('d/m/Y', $request->input('pass_date'));
            $this->passport->save();

            $media = new ProfileMedia();
            foreach ($this->passport_photos as $p )
            {
                $media->insert([
                    'user_id'     => $this->user->id,
                    'media_key'   => 'passport',
                    'media_value' => $p
                ]);
            }


             /**
             * Create girl profile
             *
             */

            $this->profile->user_id     = $this->user->id;
            $this->profile->birthday    = Carbon::createFromFormat('d/m/Y',$request->input('birthday'));
            $this->profile->height      = $request->input('height');
            $this->profile->weight      = $request->input('weight');

            $this->profile->about       = $request->input('about');
            $this->profile->looking     = $request->input('looking');
            $this->profile->l_age_start = $request->input('l_age_start');
            $this->profile->l_age_stop  = $request->input('l_age_stop');

            /** Enums */

            $this->profile->gender      = $request->input('gender');
            $this->profile->eye         = $request->input('eye');
            $this->profile->hair        = $request->input('hair');
            $this->profile->education   = $request->input('education');
            $this->profile->kids        = $request->input('kids');
            $this->profile->want_kids   = $request->input('want_k');
            $this->profile->religion    = $request->input('religion');
            $this->profile->smoke       = $request->input('smoke');
            $this->profile->drink       = $request->input('drink');
            $this->profile->occupation  = $request->input('occupation');

            $this->profile->save();

        }

        /* \Session::flash('flash_success', 'Девушка успешно добавлена');

        return redirect('/admin/girls'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.profile.girls.girl');
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

        $countries  = Country::all();
        $states     = State::all();


        return view('admin.profile.girls.edit')->with([
            'heading' => 'Редактировать профиль',
            'user' => $user,
            'selects' => $selects,
            'countries' => $countries,
            'states' => $states,
            
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

        dd( $request->input());
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
        dd($status);
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



    private function age( $bithday )
    {
        $age = Carbon::now()->diffInYears( Carbon::createFromFormat('d/m/Y', $bithday) );

        return $age;
    }

}
