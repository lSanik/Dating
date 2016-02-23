<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    function profile()
    {
        return view('admin.profile');
    }

    function store_profile(Request $request)
    {

    }





}
