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
            $upcomingAppointments=Appointment::where([['date','>=',Date('Y/m/d')],
                                              ['patient_id','=',$user->foreign_id]])->
                                              orderBy('date')->get();
            foreach($upcomingAppointments as $appointment)
                $appointment->doctor;
            $previousAppointments=Appointment::where([['date','<',Date('Y/m/d')],
                                              ['patient_id','=',$user->foreign_id]])->
                                              orderBy('date','DESC')->get();
            foreach($previousAppointments as $appointment)
                $appointment->doctor;
            $data=array('patient'=>$patient,'upcomingAppointments'=>$upcomingAppointments,
                        'previousAppointments'=>$previousAppointments);
            return view('pages.patientdashboard')->with($data);
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
