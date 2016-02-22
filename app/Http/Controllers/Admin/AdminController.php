<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function login()
    {
        return view('admin.auth.login');
    }

    function dashboard()
    {
        return view('admin.dashboard');
    }
}
