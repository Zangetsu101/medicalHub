<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Appointment;


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
            return view('pages.patientdashboard')->with('patient',$patient);

        }
        else
        {
            $doctor=Doctor::find($user->foreign_id);
            $doctor->spec;
            $doctor->hospital;
            $appointments=Appointment::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();
            $data =array(
             'doctor'=> $doctor,
             'appointments' => $appointments
            );
            return view('pages.doctordashboard')->with($data);
        }
    }
}
