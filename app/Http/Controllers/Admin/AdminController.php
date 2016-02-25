<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        Auth::user()->hasRole(['Owner', 'Moder', 'Partner']);
    }

    function login()
    {
        return view('admin.auth.login');
    }

    function dashboard()
    {
        $heading = 'Управление';
        return view('admin.dashboard')->with([
            'heading' => $heading
        ]);
    }

    function all_users()
    {

        $header = 'Все пользователи';
        $u = new User();
        $users = $u->where('users.role_id', '=', 1)
                    ->orWhere('users.role_id',  2)
                    ->orWhere('users.role_id',  3)
                    ->rightJoin('roles', 'users.role_id', '=', 'roles.id')
                    ->select(['users.id', 'email', 'first_name', 'last_name', 'name'])
                    ->paginate(15);



        return view('admin.profile.index')->with([
            'users' => $users,
            'heading' => $header
        ]);

        /*$users = DB::table('users')
            ->rightJoin('roles', 'users.role_id', '=', 'roles.id')
            ->get(['users.id', 'email', 'first_name', 'last_name', 'name']);*/
    }

}
