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
use App\Rating;
use App\User;
 

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

    //Initial dashboard to show after login. 
    //User are of three types. Patients, Doctors, Admins
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
        else if($user->type==2) //for doctors
        {
            return redirect()->route('upcomingevents');
        }
        else if($user->type==3) //for admins
        {

            $admin=auth()->user();

            $doctors=Doctor::all();

            foreach($doctors as $doc)
            {
                
                $user=User::where([
                    ['type','=','2'],
                    ['foreign_id', '=', $doc->doc_id],
                    ])->get()->first();
    
                $ratings=Rating::where([['of_user','=',$user->id]])->get();
                
                $rating_count = count($ratings);
                $rating_sum = 0.0;
                $rating = 0.0;
                
                if($rating_count != 0)
                {
                    foreach($ratings as $item)
                    {
                        $rating_sum = $rating_sum+$item->rating_value;
                    }
            
                    $rating = $rating_sum/$rating_count;
                }

                //return $rating;
                $rating = round($rating, 3);

                $doc['rating']=$rating;
                $doc->hospital;
            }

            $data=['doctors' => $doctors];
            return view('pages.admindashboard')->with($data);
        }
    }

    //Doctor's appointments showing for today
    public function todayappts()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $doctor->spec;
        $doctor->hospital;
        $appointments=Appointment::where([['doc_id','=',$doctor->doc_id],['date','=',Date('Y/m/d')]])->paginate(10);
        foreach($appointments as $appointment)
            $appointment->patient;
        $data =array(
            'doctor'=> $doctor,
            'appointments' => $appointments
        );
        return view('pages.todayappts')->with($data);
    }

    //Doctor's previous appointments showing
    public function previousappts()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $doctor->spec;
        $doctor->hospital;
        $prescriptions= Prescription::all();
        $appointments=Appointment::has('prescription')->where([['doc_id','=',$doctor->doc_id],['date','<',Date('Y/m/d')]])->orderBy('date','DESC')->paginate(10);

        foreach($appointments as $appointment)
        {
            $appointment->patient;   
            if($appointment->rating)
                $appointment['hasRating']=true;
            else
                $appointment['hasRating']=false;
        } 
            
        $data =array(
            'doctor'=> $doctor,
            'appointments' => $appointments
        );
        return view('pages.previousappts')->with($data);
    }

    //Doctor's upcoming events/appointments
    public function upcomingevents()
    {
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $event=Docevent::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')]])->get();

        return view('pages.upcomingevents')->with('event',$event);
    }

    //Doctor adding new Event
    public function newevent()
    {
        return view('pages.newevent');
    }

    //registering new event in doctor's profile
    public function neweventsubmit(Request $request)
    {
        $user=auth()->user();

        $doctor=Doctor::find($user->foreign_id);

        $ev=New Docevent;
        $ev->doc_id=$doctor->doc_id;
        $ev->eventname=$request->input('name');
        $ev->place=$request->input('place');
        $ev->time=$request->input('time');
        $ev->date=$request->input('date');

        $ev->save();

        return redirect('dashboard');
    }

    //Showing list of patient admitted under the doctor
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

    //details about upcoming emergency operations
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

    public function statistics()
    {
        $doctors=Doctor::with('hospital')->get();
        foreach($doctors as $doctor)
        {
            $doctor['count']=Appointment::where('doc_id',$doctor->doc_id)->
            whereRaw('MONTH(date)=MONTH(CURRENT_DATE)')->
            groupBy('doc_id')->orderBy('doc_id','ASC')->count();
        }
        return view('pages.statistics')->with('doctors',$doctors);
    }
}
