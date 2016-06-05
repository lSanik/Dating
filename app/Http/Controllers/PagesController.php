<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function show($slug)
    {
        $page = DB::table('pages')
            ->join('pages_translations', 'pages.id', '=', 'pages_translations.pages_id')
            ->where('pages.slug', '=', $slug)
            ->where('pages_translations.locale', '=', App::getLocale())
            ->get();

        if (\Auth::user() || \Auth::user()->hasRole('male')) {
            $users = User::where('role_id', '=', 5)->get();
        } else {
            $users = User::where('role_id', '=', 4)->get();
        }

        return view('client.page')->with([
            'page'  => $page,
            'users' => $users,
        ]);
    }
}
