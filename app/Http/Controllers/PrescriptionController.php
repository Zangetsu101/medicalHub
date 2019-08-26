<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Patient;
use App\Doctor;
use App\Appointment;
use App\Medicine;
use App\Report;

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
       $this->validate($request,[
            'appt_id'=>'required',
            'weight'=>'required',
            'bplow'=>'required',
            'bphigh'=>'required',
            'complain'=>'required'
       ]); 
       $pres=new Prescription;

       $id=count(Prescription::all())+1;
       $pres->prescription_id=$id;
       $pres->appt_id=$request->input('appt_id');
       $pres->weight=$request->input('weight');
       $pres->bp_low=$request->input('bplow');
       $pres->bp_high=$request->input('bphigh');
       $pres->cond=$request->input('complain');  
       $pres->save();

       //medicine works
       
       if(!empty($request->input('m1')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m1');
           $med->duration=$request->input('d1');
           $med->dosage=$request->input('dos1');
           $med->save();
       }

       if(!empty($request->input('m2')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m2');
           $med->duration=$request->input('d2');
           $med->dosage=$request->input('dos2');
           $med->save();
       }

       if(!empty($request->input('m3')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m3');
           $med->duration=$request->input('d3');
           $med->dosage=$request->input('dos3');
           $med->save();
       }

       if(!empty($request->input('m4')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m4');
           $med->duration=$request->input('d4');
           $med->dosage=$request->input('dos4');
           $med->save();
       }

       if(!empty($request->input('m5')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m5');
           $med->duration=$request->input('d5');
           $med->dosage=$request->input('dos5');
           $med->save();
       }

       if(!empty($request->input('m6')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m6');
           $med->duration=$request->input('d6');
           $med->dosage=$request->input('dos6');
           $med->save();
       }

       if(!empty($request->input('m7')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m7');
           $med->duration=$request->input('d7');
           $med->dosage=$request->input('dos7');
           $med->save();
       }

       if(!empty($request->input('m8')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m8');
           $med->duration=$request->input('d8');
           $med->dosage=$request->input('dos8');
           $med->save();
       }

       if(!empty($request->input('m9')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m9');
           $med->duration=$request->input('d9');
           $med->dosage=$request->input('dos9');
           $med->save();
       }

       if(!empty($request->input('m10')))
       {
           $id2=count(Medicine::all())+1;
           $med=new Medicine;

           $med->id=$id2;
           $med->prescription_id=$id;
           $med->name=$request->input('m10');
           $med->duration=$request->input('d10');
           $med->dosage=$request->input('dos10');
           $med->save();
       }

       //test works

       if(!empty($request->input('test1')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test1');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test2')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test2');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test3')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test3');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test4')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test4');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test5')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test5');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test6')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test6');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test7')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test7');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test8')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test8');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test9')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test9');
         $rep->prescription_id=$id;
         $rep->save();
       }

       if(!empty($request->input('test10')))
       {
         $rep=new Report;
         $id3=count(Report::all())+1;

         $rep->report_id=$id3;
         $rep->name=$request->input('test10');
         $rep->prescription_id=$id;
         $rep->save();
       }

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
