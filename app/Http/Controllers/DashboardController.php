<?php

namespace App\Http\Controllers;

use App\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = DB::table('user_forms')
            ->Join('students','students.id','=','user_forms.student_id')
            ->Join('group_student','group_student.student_id','=','students.id')
            ->Join('groups','groups.id','=','group_student.group_id')
            ->select(DB::raw('COUNT(user_forms.student_id) as count'))
            ->groupBy('institution_id')
            ->pluck('count');

        return view('pages.dashboard.index', ['counts' => json_encode($counts)]);
    }
}
