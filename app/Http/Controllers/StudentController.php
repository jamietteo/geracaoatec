<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use App\Test;
use App\UserForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('groups')->simplePaginate(10);


        return view('pages.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return view('pages.students.create', ['groups' => $groups]);
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
            'atec_number' => 'required',
            'name'        => 'required',
            'birthdate'   => 'required|date_format:Y-m-d|before:14 years ago'
        ]);

        $student              = new Student();
        $student->atec_number = $request->atec_number;
        $student->name        = $request->name;
        $student->birthdate   = $request->birthdate;

        $student->save();
        $student->groups()->attach($request->group_id);
        $groupid = $request->group_id;

        $studentTest = Test::with('students' )->whereHas('students.groups', function($query) use($groupid){
            return $query->where('group_id', '=', $groupid);
        })->get();

        foreach($studentTest as $test) {
            $studentIds = $test->students->pluck('id')->toArray();
            array_push($studentIds, $student->id);

            // dd(json_encode($studentIds));

            $test->students()->sync($studentIds);
            $test->save();
        }

        // dd(json_encode($studentTest));

        return redirect('students')->with('status', 'Aluno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $userform = DB::table('user_forms')->where('student_id', $student->id)->get();
        $evaluations = json_encode(DB::table('student_test')->where('student_id', $student->id)->pluck('evaluation'));
        $group = DB::table('group_student')->where('student_id', $student->id)->pluck('group_id');
        $students = DB::table('group_student')->where('group_id', $group[0])->pluck('student_id');

        $medias = [];
        foreach($students as $student_id){
            array_push($medias, DB::table('student_test')->where('student_id', $student_id)->pluck('evaluation'));
        }

        $medias = json_encode($medias);

        return view('pages.students.show', ['student' => $student, 'userform' => $userform, 'evaluations' => $evaluations, 'medias' => $medias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = Group::all();

        return view('pages.students.edit', ['student' => $student, 'groups' => $groups]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student = Student::find($student->id);
        $student->atec_number = $request->atec_number;
        $student->name = $request->name;
        $student->birthdate = $request->birthdate;
        $student->groups()->sync($request->group_id);
        $student->save();

        return redirect('students')->with('status', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('students')->with('status', 'Aluno eliminado com sucesso!');
    }
}
