<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JavaScript;
use App\Doctor;
use App\Hospital;
use App\Department;
use App\Speciality;
use App\User;
use App\Doctor_schedule;
use App\Rating;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //For doctors tab
    public function index()
    {
        $doctors=Doctor::all();
        $hospitals=Hospital::all();
        $specialities=Speciality::all();
        foreach($doctors as $doctor)
        {
            $doctor->spec;
            $doctor->hospital;
            $doctor->schedule;
            // unset($doctor->spec_id);
            // unset($doctor->hospital_id);
        }
        $data=array('doctors'=>$doctors,'hospitals'=>$hospitals,
                    'specialities'=>$specialities);
    
        return view('pages.doctors')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //For admin to create a doctor profile with data from blade
    public function create(Request $request)
    {
        $id=count(Doctor::all())+1;
        $doctor = new Doctor;
        $doctor->doc_id=$id;
        $doctor->name=$request->input('name');
        $doctor->mobile=$request->input('mobile');
        $doctor->email=$request->input('email');
        $doctor->spec_id=$request->input('spec');
        $doctor->hospital_id=$request->input('hospital');
        $doctor->designation=$request->input('designation');
        $doctor->room_no=$request->input('room');
        $doctor->fee=$request->input('fee');
        // return $doctor;
        $doctor->save();

        $uid=count(User::all())+1;
        $user=new User;
        $user->id=$id;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->type=2;
        $user->foreign_id=$id;

        $password = 12345678;
        $hashedPassword = Hash::make($password);

        $user->password=$hashedPassword;
        $user->save();
        

        return redirect()->route('timingform', ['doctor'=> $id]);
    }

    //To search a doctor.
    //Doctor can be searched using Name/Hospital/Speciality keyword
    public function filter(Request $request)
    {
        $name=$request->input('name');
        $hospital=Hospital::find($request->input('hospital'));
        $speciality=Speciality::find($request->input('speciality'));
        if($hospital)
            $doctors=$hospital->doctors;
        else
            $doctors=Doctor::all();
        if($speciality)
           $doctors=$doctors->intersect($speciality->doctors);
        if($name)
        {
            $temp=Doctor::where('name','LIKE','%'.$name.'%')->get();
            $doctors=$doctors->intersect($temp);
        }
        $hospitals=Hospital::all();
        $specialities=Speciality::all();
        foreach($doctors as $doctor)
        {
            $doctor->spec;
            $doctor->hospital;
            // unset($doctor->spec_id);
            // unset($doctor->hospital_id);
        }
        $data=array('doctors'=>$doctors,'hospitals'=>$hospitals,
                    'specialities'=>$specialities);
        return view('pages.doctors')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Doctor profile showing
    //Appointment has to be made through profile
    public function show($id)
    {
        $user=auth()->user();
        $doctor=Doctor::find($id);
        
        $disabledDays=[0,1,2,3,4,5,6];
        $days=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        $toRemove=[];
        foreach($doctor->schedule as $schedule)
        {
            for($i=0;$i<7;$i++)
            {
                if($days[$i]==$schedule->day)
                {
                    array_push($toRemove,$i);
                    // array_splice($disabledDays,$i,1);
                    break;
                }
            }
        }
        sort($toRemove);
        for($i=sizeof($toRemove)-1;$i>=0;$i--)
            array_splice($disabledDays,$toRemove[$i],1);
        JavaScript::put([
            'disabledDays' => $disabledDays        
        ]);

        $doc_user=User::where([
            ['type','=','2'],
            ['foreign_id', '=', $doctor->doc_id],
            ])->get()->first();
        
        $doc_user_id = $doc_user->id;

        $ratings=Rating::where([
            ['of_user', '=', $doc_user_id]
        ])->get();

        $rating_count = count($ratings);
        $rating_sum = 0.0;
        $rating = 0.0;
        
        if($rating_count != 0){
            foreach($ratings as $item){
                $rating_sum = $rating_sum+$item->rating_value;
            }
            $rating = $rating_sum/$rating_count;
        }

        //return $rating;
        $rating = round($rating, 3);
        $data=array('doctor'=>$doctor, 'user'=>$user, 'rating'=>$rating);
        return view('pages.docprofile')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Doctor profile details is sent to blade for editing profile
    public function edit($id)
    {        
        $doctor=Doctor::find($id);
        $hospitals=Hospital::all();
        $specialities=Speciality::all();
        $data=array('doctor'=>$doctor,'hospitals'=>$hospitals,'specialities'=>$specialities);
        return view('pages.doctoredit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Updating doctor details after editing
    public function update(Request $request, $id)
    {
        $doctor=Doctor::find($id);
        $doctor->name=$request->input('name');
        $doctor->mobile=$request->input('mobile');
        $doctor->email=$request->input('email');
        $doctor->spec_id=$request->input('spec');
        $doctor->hospital_id=$request->input('hospital');
        $doctor->designation=$request->input('designation');
        $doctor->room_no=$request->input('room');
        $doctor->fee=$request->input('fee');

        $doctor->save();

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //sending hospital, speciality data to blade for registering doctor 
    public function doctorRegister()
    {
        $hospitals=Hospital::all();
        $specialities=Speciality::all();
        $data=array('hospitals'=>$hospitals,'specialities'=>$specialities);
        return view('pages.doctorregister')->with($data);
    }

    //Sending doctor profile to blade to add timing
    public function timingForm(Request $request)
    {
        $doctor=Doctor::find($request->doctor);
        //return $doctor;
        return view('pages.timingform')->with('doctor', $doctor);
    }

    //Doctor timing registering
    public function doctorTiming(Request $request)
    {
        $doctor=Doctor::find($request->doctor);
        //return $doctor;
        
        if($request->input('suns') && $request->input('sune'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Sunday";
            $schedule->start_time=$request->input('suns');
            $schedule->end_time=$request->input('sune');

            $schedule->save();
        }

        if($request->input('mons') && $request->input('mone'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Monday";
            $schedule->start_time=$request->input('mons');
            $schedule->end_time=$request->input('mone');

            $schedule->save();
        }

        if($request->input('tues') && $request->input('tuee'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Tuesday";
            $schedule->start_time=$request->input('tues');
            $schedule->end_time=$request->input('tuee');

            $schedule->save();
        }

        if($request->input('weds') && $request->input('wede'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Wednesday";
            $schedule->start_time=$request->input('weds');
            $schedule->end_time=$request->input('wede');

            $schedule->save();
        }

        if($request->input('thurs') && $request->input('thure'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Thursday";
            $schedule->start_time=$request->input('thurs');
            $schedule->end_time=$request->input('thure');

            $schedule->save();
        }

        if($request->input('fris') && $request->input('frie'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Friday";
            $schedule->start_time=$request->input('fris');
            $schedule->end_time=$request->input('frie');

            $schedule->save();
        }

        if($request->input('sats') && $request->input('sate'))
        {
            $schedule = new Doctor_schedule;
            $id=count(Doctor_schedule::all())+1;
            $schedule->schedule_id=$id;
            $schedule->doc_id=$doctor->doc_id;
            $schedule->day="Saturday";
            $schedule->start_time=$request->input('sats');
            $schedule->end_time=$request->input('sate');

            $schedule->save();
        }
        return redirect('dashboard');
    }
}
