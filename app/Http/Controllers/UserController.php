<?php

namespace App\Http\Controllers;

use App\Institution;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::with('institution')->Paginate(5);

        return view('pages.users.index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::all();
        $roles = Role::all();

        return view('pages.users.create', ['institutions' => $institutions, 'roles' => $roles]);
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
            'atec_number'    => 'required',
            'name'           => 'required',
            'email'          => 'required',
            'institution_id' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->atec_number = $request->atec_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->institution_id = $request->institution_id;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect('users')->with('status', 'Colaborador criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $institutions = Institution::orderBy('zone')->get();

        return view('pages.users.edit', ['user' => $user, 'institutions' => $institutions, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user                 = User::find($user->id);
        $user->name           = $request->name;
        $user->atec_number    = $request->atec_number;
        $user->email          = $request->email;
        $user->institution_id = $request->institution_id;
        $user->role_id        = $request->role_id;
        $user->save();

        return redirect('users')->with('status','Colaborador editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users')->with('status', 'Colaborador eliminado com sucesso!');
    }
}
