<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::simplePaginate(10);

        return view('pages.institutions.index', ['institutions' => $institutions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.institutions.create');
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
            'zone' => 'required'
        ]);

        $institution = new Institution();
        $institution->zone = $request->zone;
        $institution->save();

        return redirect('institutions')->with('status', 'Instituição criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return view('pages.institution.show', ['institution' => $institution]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return view('pages.institution.edit', ['institution' => $institution]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        $institution       = Institution::find($institution->id);
        $institution->zone = $request->zone;
        $institution->save();

        return redirect('institutions')->with('status', 'Instituição editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $institution->users()->delete();
        $institution->groups()->delete();
        $institution->delete();

        return redirect('institutions')->with('status', 'Instituição eliminada com sucesso!');
    }
}
