<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Hospital;
use App\Speciality;

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
