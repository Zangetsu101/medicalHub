<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Appointment;
use App\Rating;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user=auth()->user();
        $appointment=Appointment::find($id);
        $doctor=User::where([
            ['type','=','2'],
            ['foreign_id', '=', $appointment->doc_id],
            ])->get()->first();
        $doc_user_id=$doctor->id;

        $patient=User::where([
            ['type','=','1'],
            ['foreign_id', '=', $appointment->patient_id],
        ])->get()->first();
        $patient_user_id=$patient->id;

        if($user->type==1) //patient giving ratings
        {
            $byuser = $patient_user_id;
            $ofuser = $doc_user_id;
        }
        else if($user->type==2) //doctor giving ratings
        {
            $byuser = $doc_user_id;
            $ofuser = $patient_user_id;
        }

        $data=array('ofuser'=>$ofuser, 'byuser'=>$byuser, 'appointment'=>$appointment);

        return view('pages.ratingform')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $curid=count(Rating::all())+1;
        $appointment=Appointment::find($id);
        $appt=$appointment->appt_id;
        $now=now()->toDateTimeString('Y-m-d') ;

        $rating = new Rating;
        $rating->rating_id=$curid;
        
        $rating->rating_value=$request->input('rating');
        $rating->comment=$request->input('comment');
        $rating->of_user=$request->input('ofuser');
        $rating->by_user=$request->input('byuser');        
        $rating->appt_id=$appt;
        $rating->updated=$now;

        //return $rating;
        $rating->save();

        return redirect()->route('dashboard');
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
