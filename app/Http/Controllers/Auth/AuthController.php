<?php

namespace App\Http\Controllers\Auth;

use App\Models\Country;
use App\Models\Social;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;

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
    protected $auth;
    private $social_user;
    // @todo check user status
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' =>
                                        ['logout','resendEmail', 'activateAccount']
                                ]);
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
            'checkTerms' => 'required'
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
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'role_id'    => 6,
        ]);
    }
    /** @todo Sender  */
    public function sendEmail(User $user)
    {
        $data = [
            'name' => $user->first_name. " " . $user->last_name,
            'code' => $user->activation_code
        ];

        \Mail::queue('emails.activateAccount', $data, function($message) use ($user){
            $message->subject( \Lang::get('auth.pleaseActivate') );
            $message->to($user->email);
        });
    }

    public function resendEmail()
    {
        $user = \Auth::user();
        if( $user->resent >= 3 )
        {
            return view('auth.tooManyEmails')->with('email', $user->email);
        } else {
            $user->resent = $user->resent + 1;
            $user->save();
            $this->sendEmail($user);
            return view('auth.activateAccount')->with('email', $user->email);
        }
    }
    //@todo Activation
    public function activateAccount($code, User $user)
    {

        if( $user->accountIsActive($code) )
        {
            \Session::flash('message', \Lang::get('auth.successActivated') );
            return redirect('/');
        }

    }

    public function getSocialRedirect( $provider )
    {

        $providerKey = \Config::get('services.' . $provider );

        if( empty($providerKey) )
            return view('pages.status')->with('error', 'No such provider');

        return Socialite::driver( $provider )->redirect();

    }

    /**
     * @param $provider
     */
    public function getSocialHandle( $provider )
    {
        $user = Socialite::driver( $provider )->user();

        $user_check = Social::where('provider', '=', $provider)->where('social_id', '=', $user->getId())->first();
        $user_check_email = User::where('email', '=', $user->getEmail())->first();

        if( $user_check || $user_check_email ) {
            \Auth::loginUsingId($user_check->user_id);
            return redirect('/home');
        } else {

            $name = explode(' ', $user->getName());
            $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
            $email = $user->getEmail();

            if( $provider == 'twitter' ){
                $role_id = 6;
                $email = $user->getName()."@example.com";
            } else {
                if( $user->user['gender'] == 'male'){
                    $role_id = 4;
                } elseif( $user->user['gender'] == 'female') {
                    $role_id = 5;
                }
            }

            $usr = new User();
            $usr->first_name = $name[0];
            $usr->last_name  = $name[1];
            $usr->email      = $email;
            $usr->password   = bcrypt($password);
            $usr->role_id    = $role_id;
            $usr->save();

            $social = new Social();
            $social->provider = $provider;
            $social->social_id = $user->getId();

            $usr->social()->save($social);

            \Auth::loginUsingId($usr->id);
            return redirect('/home');
        }


    }

}
