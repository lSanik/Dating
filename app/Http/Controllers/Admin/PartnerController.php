<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
            'email' => 'required|unique',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        $file = $request->file('avatar');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/admins';
        $file->move($destination, $fileName);


        User::create([
            'email'      => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'role_id'    => 3,
            'password'   => bcrypt( $request->input('password')),
            'avatar'     => $fileName,
            'info'       => $request->input('info'),
            'company_name'    => $request->input('company'),
            'contacts'   => $request->input('contacts'),
        ]);


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

        return view('admin.profile.partners.show')->with([
            'heading' => 'Пользователь',
            'user'  => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile.partners.edit')->with([
            'user'  => $user,
            'heading' => 'Редактировать пользователя'
        ]);
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
        $user = User::find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');

        $user->company_name    = $request->input('company');
        $user->info       = $request->input('info');
        $user->contacts   = $request->input('contacts');

        // Check email changes
        if( $request->input('email') != $user->email )
        {
            $user->email      = $request->input('email');
        }

        // Check password changes
        if( !empty( $request->input('confirm') ) )
        {
            if( $request->input('confirm') == $request->input('password') )
                $user->password   = brypt($request->input('password'));
        }

        /** Check new file  */
        if( !empty( $request->file() ) )
        {
            if( File::exists('/uploads/admins/'.$user->avatar) )
                File::delete('/uploads/admins/'.$user->avatar); // delete old file

            $file = $request->file('avatar');

            $fileName = time() . '-' . $file->getClientOriginalName();
            $destination = public_path() . '/uploads/admins';
            $file->move($destination, $fileName);

            $user->avatar     = $fileName;
        }

        $user->save();

        return redirect('/admin/partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('/admin/partners');
    }
}
