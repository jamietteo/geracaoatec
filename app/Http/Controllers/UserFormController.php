<?php

namespace App\Http\Controllers;

use App\User;
use App\UserForm;
use Illuminate\Http\Request;

class UserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userForms = UserForm::Paginate(10);

        return view('pages.userForms.index', ['userForms' => $userForms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.userForms.create');
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
            'date' => 'required|date_format:DD/MM/YY'
        ]);

        $userForm = new UserForm();
        $userForm->date = $request->date;
        $userForm->periodicity = $request->periodicity;
        $userForm->save();

        return redirect('userForms')->with('status', 'Ficha de Utente criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function show(UserForm $userForm)
    {
        return view('pages.userForms.show', ['userForm' => $userForm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function edit(UserForm $userForm)
    {
        return view('pages.userForms.edit', ['userForm' => $userForm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserForm $userForm)
    {
        $userForm = UserForm::find($userForm->id);
        $userForm->date = $request->date;
        $userForm->periodicity = $request->periodicity;
        $userForm->save();

        return redirect('userForms')->with('status', 'Ficha de Utente atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserForm $userForm)
    {
        $userForm->delete();

        return redirect('userForms')->with('status', 'Ficha de Utente eliminada com sucesso!');
    }
}
