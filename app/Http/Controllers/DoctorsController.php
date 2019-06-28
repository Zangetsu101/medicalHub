<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Department;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::all();
        foreach($doctors as $doctor)
        {
            $spec=$doctor->spec;
            $hospital=$doctor->hospital;
            $doctor["hospital_name"]=$hospital->name;
            $doctor["spec_name"]=$spec->spec_name;
            unset($doctor->spec_id);
            unset($doctor->hospital_id);
        }
        return view('pages.doctors')->with('doctors',$doctors);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $doctor=Doctor::find($id);
        $spec=Speciality::find($doctor->spec_id);
        $hospital=Hospital::find($doctor->hospital_id);
        $doctor["hospital_name"]=$hospital->name;
        $doctor["spec_name"]=$spec->spec_name;
        $dept=Department::find($spec->dept_id);
        $doctor["dept_name"]=$dept->name;
        unset($doctor->spec_id);
        unset($doctor->hospital_id);
        return $doctor;
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
}
