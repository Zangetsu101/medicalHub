<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use App\Patient;
use App\Doctor;
use App\Appointment;
use App\Prescription;
use App\Admittedpatient;
use App\Emoperations;
use App\Docevent;

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
        if($user->type==1) //for patients
        {
            $patient=Patient::find($user->foreign_id);
            $appointments=Appointment::where([['date','>=',Date('Y/m/d')],
                                              ['patient_id','=',$user->foreign_id]])->
                                              orderBy('date')->get();
            foreach($appointments as $appointment)
                $appointment->doctor;
            $prescriptions=$patient->prescriptions;
            $dates=array();
            $weights=array();
            $bp_low=array();
            $bp_high=array();
            foreach($prescriptions as $prescription)
            {
                $prescription->appointment;
                array_push($dates,$prescription->appointment->date);
                array_push($weights,$prescription->weight);
                array_push($bp_low,$prescription->bp_low);
                array_push($bp_high,$prescription->bp_high);
            }
            $data=array('patient'=>$patient,'appointments'=>$appointments,
                        'prescriptions'=>$prescriptions);
            JavaScript::put([
                'dates' => $dates,
                'weights' => $weights,
                'bp_low' => $bp_low,
                'bp_high' => $bp_high
            ]);
            return view('pages.patientdashboard')->with($data);
        }
        else if($user->type==2)
        {
            return redirect()->route('upcomingevents');
        }
        else if($user->type==3)
        {
            $admin=auth()->user();
            return view('pages.admindashboard')->with('admin', $admin);
        }
    }

    public function upcomingappts()
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
        return view('pages.upcomingappts')->with($data);
    }

    public function upcomingevents()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $event=Docevent::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();

        return view('pages.upcomingevents')->with('event',$event);
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

        $emops=Emoperations::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();

        foreach($emops as $em)
            $em->patient;
 
         $data=array(
            'emops'=>$emops,
            'doctor'=>$doctor
         );   

        return view('pages.emergencyops')->with($data);
    }



}
