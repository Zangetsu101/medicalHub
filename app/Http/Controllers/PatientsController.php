<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use App\Patient;
use App\User;
use App\Rating;


class PatientsController extends Controller
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
        $patient=Patient::find($id);
        $prescriptions=$patient->prescriptions()->paginate(10);
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
        JavaScript::put([
            'dates' => $dates,
            'weights' => $weights,
            'bp_low' => $bp_low,
            'bp_high' => $bp_high
        ]);

        $patient_user=User::where([
            ['type','=','1'],
            ['foreign_id', '=', $patient->patient_id],
            ])->get()->first();
        
        $patient_user_id = $patient_user->id;

        $ratings=Rating::where([
            ['of_user', '=', $patient_user_id]
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

        $data=array('patient'=>$patient,'prescriptions'=>$prescriptions, 'rating' => $rating);
        return view('pages.patientprofile')->with($data);
    }

    public function showweights($id)
    {
        $patient=Patient::find($id);
        $prescriptions=$patient->prescriptions;
        foreach($prescriptions as $prescription)
            $prescription->appointment;
        $data=array('patient'=>$patient,'prescriptions'=>$prescriptions);
        return view('pages.patientweights')->with($data);
    }

    public function showbps($id)
    {
        $patient=Patient::find($id);
        $prescriptions=$patient->prescriptions;
        foreach($prescriptions as $prescription)
            $prescription->appointment;
        $data=array('patient'=>$patient,'prescriptions'=>$prescriptions);
        return view('pages.patientbps')->with($data);
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
