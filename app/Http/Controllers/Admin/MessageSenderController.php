<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use App\Models\MessageSender;
use App\Models\Messages;
use App\Models\Country;
use App\Models\State;
use App\Models\Profile;
use App\Models\Options;
use App\Models\Message_sender_limit;
use Carbon\Carbon;

class MessageSenderController extends Controller
{
    private $user;
    private $profile;
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(MessageSender $MessageSender ,User $user, Profile $profile,Options $options)
    {
        $this->middleware('auth');
        $this->MessageSender = $MessageSender;
        $this->user = $user;
        $this->profile = $profile;
        //$this->options= $options;
        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
    }

    public function index(Request $request)
    {
        if (Auth::user()->hasRole('Owner') && $request->IsMethod('post')){
            if($request->partner_limit){
                $this->setConfig('sender_partner_limit',$request->partner_limit);
            }
            if($request->girl_limit){
                $this->setConfig('sender_girl_limit',$request->girl_limit);
            }
        }
        if (Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Moder')) {
            $all_messages = MessageSender::get();
        } elseif (Auth::user()->hasRole('Partner')) {
            $all_messages = MessageSender::
            where('partner_id', '=', Auth::user()->id)
                ->get();
        }
        if(isset($_GET['limit'])){
            /*
             * @TODO alert if limit
             */
        }
        return view('admin.sender.index')->with([
            'heading' => 'Массовая рассылка писем',
            'all_messages'   => $all_messages,
            'sender_partner_limit' => $this->getConfig('sender_partner_limit'),
            'sender_girl_limit' => $this->getConfig('sender_girl_limit'),
        ]);

    }

    public function get_status($status_id){
 /*       $status_array=array(
            '1' => 'moderation',
            '2' => 'checked',
            '3' => 'disable',
            '4' => 'sended'
        );
 */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($girl_id)
    {
        $selects = [
            'gender'    => array('---'=>'---')+$this->profile->getEnum('gender'),
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
        $heading = 'Создать рассылку';
        return view('admin.sender.create')->with([
            'heading'     => $heading,
            'girl_id'       => $girl_id,
            'countries' => Country::all(),
            'states'    => State::all(),
            'selects'   => $selects,
        ]);
        //with($girl_id);
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
            'title'    => 'required',
            'textarea' => 'required',
            'mans_id'  => 'required',
        ]);
        $MessageSender=$this->MessageSender;
        $MessageSender->girl_id=$request->input()["girl_id"];
        $MessageSender->partner_id=Auth::id();
        $MessageSender->title=$request->input()["title"];
        $MessageSender->body=$request->input()["textarea"];
        $MessageSender->mans_id=serialize($request->input()["mans_id"]);
        $MessageSender->save();
        return redirect('/admin/girls');
    }

    /*
     *  Ajax response for admin sender man filter
     */

    public function ajax(Request $request){

/*
 * Solution to seacrch logic for DB
 * Get data from two tables , where "WHERE" in two tables
 */

        $profile_attrs=$request->input();
        $find_users='';
        if(isset($profile_attrs['mans_id_array'])){


            $find_users=User::select(['users.id','users.first_name','users.last_name','users.nickname','users.avatar','profile.birthday'])
                ->where(
                    function ($query) use ($profile_attrs) {
                            $query->whereIn('users.id',$profile_attrs['mans_id_array'] );
                    })
                ->join('profile', 'users.id', '=', 'profile.user_id')
                ->get();
            return view('admin.sender.ajax_man')->with([
                'find_users' => $find_users,
                'edit_page' => 'true',
            ]);
        }
        $find_users = User::select(['users.id','users.first_name','users.last_name','users.nickname','users.avatar','profile.birthday'])
            ->whereHas('profile', function ($query) use ($profile_attrs){
                $arr_betwen='`birthday` BETWEEN  STR_TO_DATE(YEAR(CURDATE())-'.$profile_attrs["age_to"].', "%Y") AND STR_TO_DATE(YEAR(CURDATE())-'.($profile_attrs["age_from"]-1).', "%Y")';
                if($profile_attrs['age_from']!='---'){      $query->whereRaw($arr_betwen );}
                if($profile_attrs['eye']!= "---"){      $query->where('eye', '=', $profile_attrs['eye']);}
                if($profile_attrs['hair']!='---'){      $query->where('hair', '=', $profile_attrs['hair']);}
                if($profile_attrs['education']!='---'){ $query->where('education', '=', $profile_attrs['education']);}
                if($profile_attrs['kids']!='---'){      $query->where('kids', '=', $profile_attrs['kids']);}
                if($profile_attrs['want_kids']!='---'){ $query->where('want_kids', '=', $profile_attrs['want_kids']);}
                if($profile_attrs['family']!='---'){    $query->where('family', '=', $profile_attrs['family']);}
                if($profile_attrs['religion']!='---'){  $query->where('religion', '=', $profile_attrs['religion']);}
                if($profile_attrs['smoke']!='---'){     $query->where('smoke', '=', $profile_attrs['smoke']);}
                if($profile_attrs['drink']!='---'){     $query->where('drink', '=', $profile_attrs['drink']);}
            })
            ->where('status_id', '=', '1')
            ->where('country_id', '=', $profile_attrs['county'])
            ->where('state_id', '=', $profile_attrs['user_state_id'])
            ->join('profile', 'users.id', '=', 'profile.user_id')
            ->get();
        return view('admin.sender.ajax_man')->with([
            'find_users' => $find_users,
        ]);
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
        $message = MessageSender::where('id', '=', $id)
            ->get();
        $selects = [
            'gender'    => array('---'=>'---')+$this->profile->getEnum('gender'),
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
        $heading = 'Создать рассылку';
        return view('admin.sender.edit')->with([
            'heading'     => $heading,
            'countries' => Country::all(),
            'states'    => State::all(),
            'selects'   => $selects,
            'message'   => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'textarea' => 'required',
            'mans_id'  => 'required',
        ]);

        if (Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Moder')) {
            $status=$request->input()["status"];
        }else{
            $status="0";
        }

        $MessageSender=$this->MessageSender::find($request->input()["id"]);

        if (!empty($request->input()["girl_id"])) {
            $MessageSender->girl_id = $request->input('girl_id');
        }
        if (!empty($status)) {
            $MessageSender->status = $status;
        }
        if (!empty($request->input()["partner_id"])) {
            $MessageSender->partner_id = $request->input()["partner_id"];
        }
        if (!empty($request->input()["title"])) {
            $MessageSender->title = $request->input()["title"];
        }
        if (!empty($request->input()["textarea"])) {
            $MessageSender->body = $request->input()["textarea"];
        }
        if (!empty($request->input()["mans_id"])) {
            $MessageSender->mans_id = serialize($request->input()["mans_id"]);
        }
        $MessageSender->save();

        return redirect('/admin/sender');
    }

    public function send($id){
        $MessageSender = $this->MessageSender::find($id);
        if($MessageSender->status==1){
            $latest_sended=Message_sender_limit::get_day_count($MessageSender->partner_id);
            $counter=0;
            $limit=$this->getConfig('sender_partner_limit');
            foreach(unserialize($MessageSender->mans_id) as $man_id){
                /*
                 * @TODO add counter to limited messages...
                 *
                 * $this->getConfig('sender_partner_limit');
                 */
                if($counter+$latest_sended >= $limit){
                        /*
                         * Return message. Привышен дневной лимит!
                         *
                         */
                    return redirect('/admin/sender?limit=true');
                    break;
                }
                $Messages= new Messages;
                $Messages->from_user=$MessageSender->girl_id;
                $Messages->to_user=$man_id;
                $Messages->message=$this->message_tags_replace($MessageSender->body,$man_id);
                Message_sender_limit::add_day_count($MessageSender->partner_id,$counter);
                $Messages->save();
                $counter++;
            }
        }
        $MessageSender->status=3;
        $MessageSender->save();
        return redirect('/admin/sender');
    }
    
    private function message_tags_replace($message,$man_id){
        $find_users=User::select(['users.id','users.first_name','profile.birthday','countries.name AS countries_name','cities.name AS city_name'])
            ->where('users.id', '=', $man_id)
            ->join('profile', 'users.id', '=', 'profile.user_id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->join('cities', 'users.city_id', '=', 'cities.id')
            ->get();

        $find_users[0]['age']=date('Y-m-d') - $find_users[0]['birthday'];
        $message=str_replace('<%MAN_NAME%>',$find_users[0]['first_name'],$message);
        $message=str_replace('<%MAN_AGE%>',$find_users[0]['age'],$message);
        $message=str_replace('<%MAN_COUNTRY%>',$find_users[0]['countries_name'],$message);
        $message=str_replace('<%MAN_CITY%>',$find_users[0]['city_name'],$message);
        return $message;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MessageSender::where('id', $id)->delete();
        return redirect('/admin/sender');
    }
}
