<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

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
    public function create($id = null)
    {
        $students = Student::all();

        if(!is_null($id))
            $groups = Group::find($id);
        else
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
            'name' => 'required',
            'subject' => 'required'
        ]);

        $test = new Test();
        $test->date = $request->date;
        $test->name = $request->name;
        $test->subject = $request->subject;
        $test->save();

        $students = DB::select("select id from students s JOIN group_student gs
                                      on s.id = gs.student_id
                                      where gs.group_id = '$request->group_id'");

        $ids=[];
        for($i = 0; $i<sizeof($students); $i++)
        {
            array_push($ids, $students[$i]->id);
        }

        $test->students()->attach($ids);


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
        $students = DB::select("select id from students s JOIN group_student gs
                                      on s.id = gs.student_id
                                      where gs.group_id = '$request->group_id'");

        $group = DB::table('student_test')->where('test_id', $test->id)->pluck('student_id');

        $test->date = $request->date;
        $test->name= $request->name;
        $test->subject = $request->subject;

        $array = [];


        for($i = 0; $i<sizeof($students); $i++)
        {
            for($k = 0; $k<sizeof($group); $k++)
            {
                if($students[$i]->id == $group[$k])
                {
                    $test->students()->updateExistingPivot($students[$i], ['evaluation'=>$request->evaluation[$students[$i]->id]]);
                }
            }

            array_push($array, $students[$i]->id);
        }

        $test->students()->sync($array);
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
