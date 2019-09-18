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

    //Finding the users related to this rating and sending the data to blade
    public function index($id)
    {
        $user=auth()->user();
        $appointment=Appointment::find($id);
        $doctor=User::where([
            ['type','=','2'],
            ['foreign_id', '=', $appointment->doc_id],
            ])->get()->first();
        $doc_user_id=$doctor->id;
        $doc_user_name=$doctor->name;    

        $patient=User::where([
            ['type','=','1'],
            ['foreign_id', '=', $appointment->patient_id],
        ])->get()->first();
        $patient_user_id=$patient->id;
        $patient_user_name=$patient->name;

        if($user->type==1) //patient giving ratings
        {
            $byuser = $patient_user_id;
            $ofuser = $doc_user_id;
            $byusername=$patient_user_name;
            $ofusername=$doc_user_name;
        }
        else if($user->type==2) //doctor giving ratings
        {
            $byuser = $doc_user_id;
            $ofuser = $patient_user_id;
            $byusername=$doc_user_name;
            $ofusername=$patient_user_name;
        }

        $existing=Rating::where([
            ['appt_id', '=', $appointment->appt_id],
            ['of_user', '=', $ofuser],
            ['by_user', '=', $byuser],
        ])->get();

        if (count($existing) > 0)
        {
            if($user->type==2){
                return redirect()->route('previousappts')->with('Failure', 'Rating already given');
            }
            else if($user->type==1){
                return redirect()->route('dashboard')->with('Failure', 'Rating already given');
            }
        }

        $data=array('ofuser'=>$ofuser, 'byuser'=>$byuser, 'appointment'=>$appointment, 'byusername'=>$byusername, 'ofusername'=>$ofusername);

        return view('pages.ratingform')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //rating creation. Can be created only once
    public function create(Request $request, $id)
    {
        $user=auth()->user();
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
        
        if($user->type==1){
            return redirect()->route('dashboard');
        }
        else if($user->type==2){
            return redirect()->route('previousappts');
        }
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
    public function show()
    {
        $user=auth()->user();
        $user_id = $user->id;

        $ratings=Rating::where([
            ['of_user', '=', $user_id]
        ])->get();

        /*$rating_count = count($ratings);
        $rating_sum = 0.0;
        $rating = 0.0;
        
        if($rating_count != 0){
            foreach($ratings as $item){
                $rating_sum = $rating_sum+$item->rating_value;
            }
            $rating = $rating_sum/$rating_count;
        }*/

        //return $ratings;
        
        if($user->type==1){
            return view('pages.patratings')->with('ratings',$ratings);
        }
        else if($user->type==2){
            return view('pages.docratings')->with('ratings',$ratings);
        }
        
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
