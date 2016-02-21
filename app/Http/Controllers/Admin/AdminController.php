<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    function index()
    {
        return view('admin.dashboard');
    }

    function login()
    {
        return view('admin.auth.login');
    }
}
