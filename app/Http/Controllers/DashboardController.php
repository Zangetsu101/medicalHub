<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Appointment;
<<<<<<< HEAD
=======

>>>>>>> e12f5c71d26c1d4e3543093b2ace0f4fbe9bb711

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
<<<<<<< HEAD
            $appointments=Appointment::where([['date','>=',Date('Y/m/d')],
                                              ['patient_id','=',$user->foreign_id]])->get();
            foreach($appointments as $appointment)
                $appointment->doctor;
            $data=array('patient'=>$patient,'appointments'=>$appointments);
            return view('pages.patientdashboard')->with($data);
=======
            return view('pages.patientdashboard')->with('patient',$patient);

>>>>>>> e12f5c71d26c1d4e3543093b2ace0f4fbe9bb711
        }
        else
        {
            $doctor=Doctor::find($user->foreign_id);
            $doctor->spec;
            $doctor->hospital;
<<<<<<< HEAD
            return view('pages.doctordashboard')->with('doctor',$doctor);
=======
            $appointments=Appointment::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();
            $data =array(
             'doctor'=> $doctor,
             'appointments' => $appointments
            );
            return view('pages.doctordashboard')->with($data);
>>>>>>> e12f5c71d26c1d4e3543093b2ace0f4fbe9bb711
        }
    }
}
