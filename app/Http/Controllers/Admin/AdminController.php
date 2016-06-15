<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Auth::user()->hasRole(['Owner', 'Moder', 'Partner']);

        view()->share('new_ticket_messages', parent::getUnreadMessages());
        view()->share('unread_ticket_count', parent::getUnreadMessagesCount());
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function dashboard()
    {//@todo refactor this shit
        $heading = 'Управление';
        $girls = User::where('role_id', '=', '5')->get();

        $active = User::where('role_id', '=', '5')
                      ->where('status_id', '=', 1)
                      ->get();
        $deactive = User::where('role_id', '=', '5')
                        ->where('status_id', '=', 2)
                        ->get();

        $dismiss = User::where('role_id', '=', '5')
                        ->where('status_id', '=', 3)
                        ->get();

        $deleted = User::where('role_id', '=', '5')
                    ->where('status_id', '=', 4)
                    ->get();

        $moder = User::where('role_id', '=', '5')
                        ->where('status_id', '=', 5)
                        ->get();

        $partner = User::where('role_id', '=', '3')->get();
        $moderator = User::where('role_id', '=', '2')->get();
        $man = User::where('role_id', '=', '4')->get();

        return view('admin.dashboard')->with([
            'heading'       => $heading,
            'girls'         => $girls,
            'active'        => $active,
            'deactive'      => $deactive,
            'dismiss'       => $dismiss,
            'deleted'       => $deleted,
            'moderation'    => $moder,
            'partner'       => $partner,
            'moderator'     => $moderator,
            'man'           => $man,
        ]);
    }

    public function all_users()
    {
        $header = 'Все пользователи';
        $u = new User();
        $users = $u->where('users.role_id', '=', 1)
                    ->orWhere('users.role_id', 2)
                    ->orWhere('users.role_id', 3)
                    ->rightJoin('roles', 'users.role_id', '=', 'roles.id')
                    ->select(['users.id', 'email', 'first_name', 'last_name', 'name'])
                    ->paginate(15);

        return view('admin.profile.index')->with([
            'users'   => $users,
            'heading' => $header,

        ]);

        /*$users = DB::table('users')
            ->rightJoin('roles', 'users.role_id', '=', 'roles.id')
            ->get(['users.id', 'email', 'first_name', 'last_name', 'name']);*/
    }

    public function profile()
    {
        $id = Auth::id();

        $user = User::find($id);

        return view('admin.profile')->with([
            'user'    => $user,
            'heading' => 'Профиль пользователя',

        ]);
    }

    public function profile_update(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        $user->company_name = $request->input('company');
        $user->info = $request->input('info');
        $user->contacts = $request->input('contacts');

        // Check email changes
        if ($request->input('email') != $user->email) {
            $user->email = $request->input('email');
        }

        // Check password changes
        if (!empty($request->input('confirm'))) {
            if ($request->input('confirm') == $request->input('password')) {
                $user->password = brypt($request->input('password'));
            }
        }

        /* Check new file*/
        if (!empty($request->file())) {
            if (File::exists('/uploads/admins/'.$user->avatar)) {
                File::delete('/uploads/admins/'.$user->avatar);
            } // delete old file

            $file = $request->file('avatar');

            $fileName = time().'-'.$file->getClientOriginalName();
            $destination = public_path().'/uploads/admins';
            $file->move($destination, $fileName);

            $user->avatar = $fileName;
        }

        $user->save();

        return redirect('/admin/profile');
    }
}
