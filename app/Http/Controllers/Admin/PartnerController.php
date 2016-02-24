<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $users = $user->where('users.role_id', '=', 3)
                ->rightJoin('roles', 'users.role_id', '=', 'roles.id')
                ->select(['users.id', 'email', 'first_name', 'last_name', 'name'])
                ->paginate(15);

        return view('admin.profile.partners.index')->with([
            'users'     => $users,
            'heading'   => 'Все партнеры'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profile.partners.create')->with([
            'heading' => 'Добавить партнера'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $partner = new Partner();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if( $validator->passes() )
        {

        }


        return redirect('/admin/partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $partner = Partner::where('user_id', '=', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->post->where('id',$id)->delete();
        $user = new User();
        $partner = new Partner();

        $user->where('id', $id)->delete();


        return redirect('/admin/partners');
    }
}
