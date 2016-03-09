<?php

namespace App\Http\Controllers\Auth;

use App\Models\Social;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    // @todo check user status
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id'   => '4'
        ]);
    }


    public function getSocialRedirect( $provider )
    {
        $providerKey = \Config::get('services.' . $provider );

        if( empty($providerKey) )
            return view('pages.status')->with('error', 'No such provider');

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {
        $user = Socialite::driver( $provider )->user();

        $social_user = null;

        $user_check = User::where('email', '=', $user->email)->first();

        if( !empty($user_check) )
        {
            $social_user = $user_check;
        }
        else
        {
            $same_social_id = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider)->first();

            if( empty($same_social_id) )
            {
                $new_social_user = new User;
                $new_social_email = $user->email;
                $name = explode(' ', $user->name);

                if( is_array($name) )
                {
                    if(!empty($name[0]))
                        $new_social_user->first_name = $name[0];

                    if(!empty($name[1]))
                        $new_social_user->last_name = $name[1];
                }
                else
                {
                    //todo Действие если нет имени и фамилии просьба ввода
                }

                $new_social_user->active = '1';

                $the_activation_code = str_random(60) . $user->email;
                $new_social_user->activation_code = $the_activation_code;

                $new_social_user->role_id = 1;
                $new_social_user->status_id = 0;
                $new_social_user->partner_id = 0;
                $new_social_user->city_id = 0;
                $new_social_user->country_id = 0;

                $new_social_user->save();

                $social_data                = new Social;

                $social_data->social_id     = $user->id;
                $social_data->provider      = $provider;

                $new_social_user->social()->save($social_data);
            }
            else{
                //Load Existing social user
                $social_user = $same_social_id->user;
            }
        }

        $this->auth->login($social_user, true);

    }


}
