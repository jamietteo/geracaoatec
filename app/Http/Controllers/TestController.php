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
        $tests = Test::with('students')->simplePaginate(10);

        return view('pages.tests.index', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $groups = Group::all();

        return view('pages.tests.create', ['students' => $students, 'groups' => $groups]);
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

        $students = Student::all();

        foreach($students as $student)
        {
            foreach ($student->groups as $group)
            {
                if($group->id == $request->group_id)
                    $test->students()->attach($student->id);
            }
        }

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
        $students = Student::all();
        $groups = Group::all();

        return view('pages.tests.edit', ['test' => $test, 'students' => $students, 'groups' => $groups]);
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
        $students = Student::all();
        //Post::whereRelation('comments', 'is_approved', false)->get();
        //ddd($students);

        //$test = Test::find($test->id);
        $test->date = $request->date;
        $test->name= $request->name;
        $test->subject = $request->subject;
        $test->save();

        $array = [];
        //ddd($test->students_test()->where('test_id', $test->id)->get());
        foreach ($students as $student)
        {
            foreach ($student->groups as $group)
            {
                if($group->id == $request->group_id)
                {
                    //ddd($test->students()->sync($student->id));
                    /*$test->students()->syncWithoutDetaching($student->id);
                    $test->students()->updateExistingPivot($test, ['evaluation'=>$request->evaluation]);*/
                    array_push($array, $student->id);

                }
            }
        }


        $test->students()->sync($array);
        //ddd($array);


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
