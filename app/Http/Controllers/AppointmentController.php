<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Appointment;
use App\Patient;

class AppointmentController extends Controller
{
    //
    public function index(Request $request)
    {
        $doctor=Doctor::find($request->doctor);
        return view('pages.appointment')->with('doctor',$doctor);
    }

    public function store(Request $request)
    {
        $user=auth()->user();
        $doctor=Doctor::find($request->doctor);
        $patient=Patient::find($user->foreign_id);
        $date=$request->input('date');
        if(Appointment::where(['date'=>$date,'doc_id'=>$doctor->doc_id,
                               'patient_id'=>$patient->patient_id])->count()>0)
            return "You already have an appointment on that day";
        $serialNo=Appointment::where('date',$date)->max('serial_no');
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
        return "Appointment added";
    }
}
