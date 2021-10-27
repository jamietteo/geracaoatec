<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $counts = \DB::select("select COUNT(us.student_id) from user_forms us JOIN students s
                                     on us.student_id = s.id JOIN group_student gs
                                     on s.id = gs.student_id JOIN groups g
                                     on gs.group_id = g.id
                                     group by institution_id");


        return view('pages.dashboard.index', ['counts' => $counts]);
    }
}
