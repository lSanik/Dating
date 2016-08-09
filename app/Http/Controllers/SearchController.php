<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
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
        return view('client.search')->with([
            'selects'   => $this->getSelects(),
            'users'     => $this->getUsers($this->getRole()),
            'countries' => Country::all(),
            'states'    => State::all(),
        ]);
    }

    public function search(Request $request)
    {
        //dump($request->input());

        $users = User::where('role_id', '=', $this->getRole())
            ->where('status_id', '=', 1)
            ->paginate(20);

        $users=$this->searchGetProfiles($request);
        //todo Search

        return view('client.search')->with([
            'users' => $users['find_users'],
            'selects' => $this->getSelects(),
            'search_attrs' => $request,
            'countries' => Country::all(),
            'states'    => State::all(),
        ]);
    }

    public function searchGetProfiles($request){
        $profile_attrs=$request->input();
        if($profile_attrs['is_avatar']==1){
            $avatar='';
        }else{
            $avatar='iss_set';
        }
        $find_users=User::select(['users.*','profile.birthday'])
            ->whereHas('profile', function ($query) use ($profile_attrs){
                $arr_betwen='`birthday` BETWEEN  STR_TO_DATE(YEAR(CURDATE())-'.$profile_attrs["age_stop"].', "%Y") AND STR_TO_DATE(YEAR(CURDATE())-'.($profile_attrs["age_start"]-1).', "%Y")';
                if($profile_attrs['age_start']!='---'){      $query->whereRaw($arr_betwen );}
                if($profile_attrs['eyes']!= "---"){      $query->where('eye', '=', $profile_attrs['eyes']);}
                if($profile_attrs['hair']!='---'){      $query->where('hair', '=', $profile_attrs['hair']);}
                if($profile_attrs['education']!='---'){ $query->where('education', '=', $profile_attrs['education']);}
                if($profile_attrs['kids']!='---'){      $query->where('kids', '=', $profile_attrs['kids']);}
                if($profile_attrs['want_k']!='---'){ $query->where('want_kids', '=', $profile_attrs['want_k']);}
                if($profile_attrs['family']!='---'){    $query->where('family', '=', $profile_attrs['family']);}
                if($profile_attrs['religion']!='---'){  $query->where('religion', '=', $profile_attrs['religion']);}
                if($profile_attrs['smoke']!='---'){     $query->where('smoke', '=', $profile_attrs['smoke']);}
                if($profile_attrs['drink']!='---'){     $query->where('drink', '=', $profile_attrs['drink']);}

                if($profile_attrs['height']!='---' && $profile_attrs['height']!=0  ){     $query->where('height', '=', $profile_attrs['height']);}
                if($profile_attrs['weight']!='---' && $profile_attrs['weight']!=0){     $query->where('weight', '=', $profile_attrs['weight']);}
            })

            ->where('role_id', '=', '4')
            ->where('status_id', '=', '1')
            ->where('avatar','!=', $avatar)




            ->where(function ($query) use ($profile_attrs){
                if (isset($profile_attrs['county']) && $profile_attrs['county']!='false'){
                    $query->where('country_id', '=', $profile_attrs['county']);
                }
            })
            ->where(function ($query) use ($profile_attrs){
                if (isset($profile_attrs['user_state_id'])){
                    $query->where('state_id', '=', $profile_attrs['user_state_id']);
                }
            })
            //->where('state_id', '=', $profile_attrs['user_state_id'])
            ->join('profile', 'users.id', '=', 'profile.user_id')
            ->paginate(20);
        return [
            'find_users' => $find_users,
        ];
        //$find_users;//var_dump($find_users );
    }

    private function getSelects()
    {
        return [
            'eye'       => array('---'=>'---')+$this->profile->getEnum('eye'),
            'hair'      => array('---'=>'---')+$this->profile->getEnum('hair'),
            'education' => array('---'=>'---')+$this->profile->getEnum('education'),
            'kids'      => array('---'=>'---')+$this->profile->getEnum('kids'),
            'want_k'    => array('---'=>'---')+$this->profile->getEnum('want_kids'),
            'family'    => array('---'=>'---')+$this->profile->getEnum('family'),
            'religion'  => array('---'=>'---')+$this->profile->getEnum('religion'),
            'smoke'     => array('---'=>'---')+$this->profile->getEnum('smoke'),
            'drink'     => array('---'=>'---')+$this->profile->getEnum('drink'),
        ];
    }
}
