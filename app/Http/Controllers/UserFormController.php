<?php
namespace App\Http\Controllers;

use App\Student;
use App\User;
use App\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userForms = UserForm::with('student', 'student.groups')->Paginate(10);

        return view('pages.userForms.index', ['userForms' => $userForms]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $userForms = UserForm::all();
        $users  = User::all();

        if($id != null)
            $students = Student::find($id);
        else
            $students = Student::all();

        return view('pages.userForms.create',['userForms' => $userForms, 'students'=> $students, 'users' =>$users]);
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
            'date' => 'required|date_format:Y-m-d|after:yesterday',
            'periodicity' => 'required',
            'student_id' => 'required',
            'user_id' => 'required'
        ]);

        $userForm = new UserForm();
        $userForm->date = $request->date;
        $userForm->periodicity = $request->periodicity;
        $userForm->student_id = $request->student_id;
        $userForm->user_id = $request ->user_id;
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
        $students  = Student::all();
        $users  = User::with('student', 'student.groups');
        $sessions = DB::table('sessions')->where('user_forms_id', $userForm->id)->get();

        return view('pages.userForms.show', ['userForm' => $userForm, 'students'=> $students, 'users' => $users, 'sessions' => $sessions]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function edit(UserForm $userForm)
    {
        $students  = Student::all();
        $users  = User::all();

        return view('pages.userForms.edit', ['userForm' => $userForm, 'students'=> $students, 'users' =>$users]);
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
        $userForm->user_id = $request->user_id;
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
