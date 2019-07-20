<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Appointment;
use App\Admittedpatient;
use App\Emoperations;

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
            $appointments=Appointment::where([['date','>=',Date('Y/m/d')],
                                              ['patient_id','=',$user->foreign_id]])->get();
            foreach($appointments as $appointment)
                $appointment->doctor;
            $data=array('patient'=>$patient,'appointments'=>$appointments);
            return view('pages.patientdashboard')->with($data);
        }
        else if($user->type==2)
        {
            return view('pages.doctordashboard');
        }
        
        else if($user->type==3)
        {
            return view('pages.adminboard');
        }

    }

    public function apptfortoday()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $doctor->spec;
        $doctor->hospital;
        $appointments=Appointment::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();
        foreach($appointments as $appointment)
            $appointment->patient;
        $data =array(
            'doctor'=> $doctor,
            'appointments' => $appointments
        );
        return view('pages.apptfortoday')->with($data);
    }

    public function doctodayschedule()
    {
        return view('pages.doctodayschedule');
    }

    public function admittedpatients()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);

        $admittedpatients=Admittedpatient::where('doc_id',$doctor->doc_id)->get();

        foreach($admittedpatients as $ap)
            $ap->patient;
 
         $data=array(
            'admittedpatients'=>$admittedpatients,
            'doctor'=>$doctor
         );   

        
        return view('pages.admittedpatients')->with($data);
    }

    public function emergencyops()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);

        $emops=Emoperations::where('doc_id',$doctor->doc_id)->get();

        foreach($emops as $em)
            $em->patient;
 
         $data=array(
            'emops'=>$emops,
            'doctor'=>$doctor
         );   

        return view('pages.emergencyops')->with($data);
    }

}
