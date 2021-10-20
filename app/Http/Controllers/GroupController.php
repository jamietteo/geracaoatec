<?php

namespace App\Http\Controllers;

use App\Group;
use App\Institution;
use App\Student;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('institution')->paginate(15);

        return view('pages.groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::all();
        return view('pages.groups.create', ['institutions' => $institutions]);
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
            'institution_id' => 'required'
        ]);

        Group::create([
            'name'           => $request->name,
            'institution_id' => $request->institution_id,
        ]);

        return redirect('groups')->with('status', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('pages.groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $institutions = Institution::orderBy('zone')->get();

        return view('pages.groups.edit', ['group' => $group, 'institutions' => $institutions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group       = Group::find($group->id);
        $group->name = $request->name;
        $group->institution_id = $request->institution_id;
        $group->save();

        return redirect('groups')->with('status', 'Turma editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->students()->delete();
        $group->delete();

        return redirect('groups')->with('status', 'Turma eliminada com sucesso!');
    }
}
