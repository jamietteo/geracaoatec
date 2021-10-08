<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::with('students', 'groups')->simplePaginate(10);

        return view('pages.tests.index', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        //$students = Student::all();

        return view('pages.tests.create', ['groups' => $groups]);
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
            'date' => 'required',
            'subject' => 'required'
        ]);

        $test = new Test();
        $test->date = $request->date;
        $test->name = $request->name;
        $test->subject = $request->subject;
        $test->save();
        $test->groups()->attach($request->group_id);

        return redirect('tests')->with('status', 'Teste criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('pages.tests.show', ['test' => $test]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $groups = Group::all();

        return view('pages.tests.edit', ['test' => $test, 'groups' => $groups]);
    }

    public function insert(Test $test){
        $groups = Group::all();

        return view('pages.tests.insert', ['test' => $test, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $test = Test::find($test->id);
        $test->date = $request->date;
        $test->name= $request->name;
        $test->subject = $request->subject;
        $test->groups()->sync($request->group_id);
        $test->students()->updateExistingPivot($test, ['evaluation'=>$request->evaluation]);
        $test->save();

        return redirect('tests')->with('status', 'Teste atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect('tests')->with('status', 'Teste eliminado com sucesso!');
    }
}
