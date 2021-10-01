<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Http\Request;

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
            'birthdate'   => 'required'
        ]);
        $groups = Group::all();
        $student              = new Student();
        $student->atec_number = $request->atec_number;
        $student->name        = $request->name;
        $student->birthdate   = $request->birthdate;

        $student->save();
        $student->groups()->attach($groups);

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

        return view('pages.students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = $student->groups()->get();

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
        $student->groups()->group_id = $request->group_id; //TODO: Verificar isto!
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
