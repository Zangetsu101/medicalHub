<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Hospital;
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
        $hospitals=Hospital::all();
        $departments=Department::all();
        foreach($doctors as $doctor)
        {
            $doctor->spec;
            $doctor->hospital;
            // unset($doctor->spec_id);
            // unset($doctor->hospital_id);
        }
        foreach($departments as $department)
            $department->specialities;
        $data=array('doctors'=>$doctors,'hospitals'=>$hospitals,
                    'departments'=>$departments);
        return view('pages.doctors')->with($data);
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

    public function filter(Request $request)
    {
        $name=$request->input('name');
        $hospital=Hospital::find($request->input('hospital'));
        $department=Department::find($request->input('department'));
        if($hospital)
            $doctors=$hospital->doctors;
        else
            $doctors=Doctor::all();
        if($department)
        {
            $specialities=$department->specialities;
            $temp=collect();
            foreach($specialities as $speciality)
                $temp=$temp->merge($speciality->doctors);
            $doctors=$doctors->intersect($temp);
        }
        if($name)
        {
            $temp=Doctor::where('name','LIKE','%'.$name.'%')->get();
            $doctors=$doctors->intersect($temp);
        }
        $hospitals=Hospital::all();
        $departments=Department::all();
        foreach($doctors as $doctor)
        {
            $doctor->spec;
            $doctor->hospital;
            // unset($doctor->spec_id);
            // unset($doctor->hospital_id);
        }
        foreach($departments as $department)
            $department->specialities;
        $data=array('doctors'=>$doctors,'hospitals'=>$hospitals,
                    'departments'=>$departments);
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
    public function show($id)
    {
        //
        $doctor=Doctor::find($id);
        $doctor->spec;
        $doctor->hospital;
        $doctor->spec->dept;
        // unset($doctor->spec_id);
        // unset($doctor->hospital_id);
        return view('pages.docprofile')->with('doctor',$doctor);
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
