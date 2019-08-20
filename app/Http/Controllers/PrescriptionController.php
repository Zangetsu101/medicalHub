<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Patient;
use App\Doctor;
use App\Appointment;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       $pres=new Prescription;

       $id=count(Prescription::all())+1;
       $pres->prescription_id=$id;
       $pres->appt_id=$request->input('appt_id');
       $pres->weight=$request->input('weight');
       $pres->bp_low=$request->input('bplow');
       $pres->bp_high=$request->input('bphigh');
       $pres->cond=$request->input('complain');  

       $pres->save();

       return redirect()->route('upcomingappts');

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
    public function show($id)
    {
        //
        $prescription=Prescription::find($id);
        $reports=$prescription->reports;
        $medicines=$prescription->medicines;
        $data=array('prescription'=>$prescription,'reports'=>$reports,'medicines'=>$medicines);
        return view('pages.prescription')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function prescriptioncreate(Request $request)
    {
        $patient=Patient::find($request->patient);
        $user=auth()->user();
        $doctor=Doctor::find($user->foreign_id);
        $doctor->spec;
        $doctor->hospital;
        $appointments=Appointment::where([['doc_id','=',$doctor->doc_id],['date','>=',Date('Y/m/d')], ['patient_id','=',$patient->patient_id]])->get();

        $ap=$appointments->first();


        $data =array(
            'doctor'=> $doctor,
            'appointments' => $ap,
            'patients'=>$patient
        );

       
        return view('pages.prescriptioncreate')->with($data);

    }



}
