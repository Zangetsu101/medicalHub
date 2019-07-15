<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Appointment;
use App\Patient;
use App\Prescription;
use App\Report;

class AppointmentController extends Controller
{
    //
    public function index(Request $request)
    {
        $doctor=Doctor::find($request->doctor);
        return view('pages.createappointment')->with('doctor',$doctor);
    }

    public function store(Request $request)
    {
        $user=auth()->user();
        $doctor=Doctor::find($request->doctor);
        $patient=Patient::find($user->foreign_id);
        $date=$request->input('date');
        if(Appointment::where(['date'=>$date,'doc_id'=>$doctor->doc_id,
                               'patient_id'=>$patient->patient_id])->count()>0)
            return redirect('dashboard')->with('failure','You already have an appointment on that day with '.$doctor->name);
        $serialNo=Appointment::where(['date'=>$date,'doc_id'=>$doctor->doc_id])->max('serial_no');
        if(!$serialNo)
            $serialNo=1;
        else
            $serialNo++;
        $appointment=new Appointment;
        $appointment->date=$date;
        $appointment->serial_no=$serialNo;
        $appointment->doc_id=$doctor->doc_id;
        $appointment->patient_id=$patient->patient_id;
        $appointment->save();
        return redirect('dashboard')->with('success','Appointment Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $appointment=Appointment::find($id);
        $prescriptions=$appointment->prescriptions;
        $reports=$appointment->reports;
        $data=array('appointment'=>$appointment,'prescriptions'=>$prescriptions,'reports'=>$reports);
        return view('pages.appointment')->with($data);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
