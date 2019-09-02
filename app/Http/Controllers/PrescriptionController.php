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
       
       $pres=new Prescription;

       $pres->appt_id=$request->input('appt_id');
       $pres->weight=$request->input('weight');
       $pres->bp_low=$request->input('bpLow');
       $pres->bp_high=$request->input('bpHigh');
       $pres->save();

       return $pres;
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
        $tests=$prescription->prescribedTests;
        $medicines=$prescription->prescribedMedicines;
        foreach($medicines as $medicine)
          $medicine->medicine;
        $prescription->symptoms;
        $data=array('prescription'=>$prescription,'tests'=>$tests,'medicines'=>$medicines);
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
        $appointment=Appointment::find($request->appointment);
        $prescription=$appointment->prescription;
        if($prescription)
        {
          return redirect()->route('prescription.show',$prescription->prescription_id);
        }
        $doctor=Doctor::find($appointment->doc_id);
        $doctor->spec;
        $doctor->hospital;
        $patient=Patient::find($appointment->patient_id);

        $data=array(
          'doctor'=>$doctor,
          'appointment'=>$appointment,
          'patient'=>$patient
        );

        return view('pages.prescriptioncreate')->with($data);

    }



}
