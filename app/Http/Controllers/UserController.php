<?php

namespace App\Http\Controllers;

use App\Institution;
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
        $users = User::with('institutions')->simplePaginate(10);

        return view('pages.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::all();

        return view('pages.users.create', ['institutions' => $institutions]);
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
            'name'           => 'required',
            'atec_number'    => 'required',
            'password'       => 'required|min:6',
            'institution_id' => 'required|exists:institutions,id'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->atec_number = $request->atec_number;
        $user->password = $request->password;
        $user->institution_id = $request->institution_id;

        $user->save();

        return redirect('users')->with('status', 'User criado com sucesso!');
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
        $institutions = Institution::orderBy('zone')->get();

        return view('pages.users.edit', ['user' => $user, 'institutions' => $institutions]);
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
        $user->institution_id = $request->institution_id;
        $user->save();

        return redirect('users')->with('status','User edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->institutions()->delete();
        $user->delete();

        return redirect('users')->with('status', 'User eliminado com sucesso!');
    }
}
