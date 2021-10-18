<?php

namespace App\Http\Controllers;

use App\Session;
use App\UserForm;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::with('userForms')->simplePaginate(10);

        return view('pages.sessions.index', ['sessions' => $sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all();
        $userForms = UserForm::all();

        return view('pages.sessions.create',['sessions' => $sessions, 'userForms' => $userForms]);
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
            'user_forms_id' => 'required',
            'begin_time' => 'required',
            'comments' => 'required'
        ]);

        $session = new Session();
        $session->user_forms_id = $request->user_forms_id;
        $session->begin_time = $request->begin_time;
        $session->comments = $request->comments;
        $session->save();

        return redirect('sessions')->with('status', 'Sessão criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        $userForms = UserForm::all();

        return view('pages.sessions.show', ['session' => $session, 'userForms' => $userForms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        $userForms = UserForm::all();

        return view('pages.sessions.edit', ['session' => $session, 'userForms' => $userForms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $session = Session::find($session->id);
        $session->begin_time = $request->begin_time;
        $session->comments = $request->comments;
        $session->save();

        return redirect('sessions')->with('status', 'Sessão atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return redirect('sessions')->with('status', 'Sessão eliminada com sucesso!');
    }
}
