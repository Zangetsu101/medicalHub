<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
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
    }

    //Creating new appointment. Can't add multiple appointments on same day with same doctor
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

    //Destroying appointment. Patient will be able to destroy appointment if needed.
    public function destroy($id)
    {
        $appointment=Appointment::find($id);
        $nextAppointments=Appointment::where(['date'=>$appointment->date,'doc_id'=>$appointment->doc_id,
                                              ['serial_no','>',$appointment->serial_no]])->get();
        if($appointment->delete())
        {
            foreach($nextAppointments as $appt)
            {
                $appt->serial_no--;
                $appt->save();
            }
            return redirect('dashboard')->with('success','Appointment Deleted!');
        }
        else
            return redirect('dashboard')->with('failure','Appointment Deletion Failed!');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
