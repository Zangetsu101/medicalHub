<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=auth()->user();
        if($user->type==1)
        {
            $patient=Patient::find($user->foreign_id);
            return view('patientdashboard')->with('patient',$patient);
        }
        else
        {
            $doctor=Doctor::find($user->foreign_id);
            $doctor->spec;
            $doctor->hospital;
            return view('doctordashboard')->with('doctor',$doctor);
        }
    }
}
