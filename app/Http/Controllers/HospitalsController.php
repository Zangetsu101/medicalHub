<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Department;

class HospitalsController extends Controller
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
        $id=count(Hospital::all())+1;
        $hospital = new Hospital;
        $hospital->hospital_id=$id;
        $hospital->name=$request->input('name');
        $hospital->address=$request->input('address');
        $hospital->mobile=$request->input('mobile');
        $hospital->license_no=$request->input('license');
        
        $hospital->save();

        return redirect('dashboard');
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
    public function show($hospital_id)
    {
        $user=auth()->user();
        $hospital=Hospital::find($hospital_id);

        $data=array('hospital'=>$hospital, 'user'=>$user);

        return view('pages.hospitalprofile')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital=Hospital::find($id);
        return view('pages.hospitaledit')->with('hospital', $hospital);
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
        $hospital=Hospital::find($id);
        $hospital->name=$request->input('name');
        $hospital->address=$request->input('address');
        $hospital->mobile=$request->input('mobile');
        $hospital->license_no=$request->input('license');
        
        $hospital->save();

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

    public function hospitalRegister()
    {
        return view('pages.hospitalregister');
    }
}
